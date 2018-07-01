<template>
    <div>
        <form class="cf" @keydown="form.errors.clear($event.target.name)">
            
            <input type="text" id="name" name="name" placeholder="Client's name" v-model="form.name">
            <span class="help alert-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
            
            <input type="text" id="contact_person" name="contact_person" placeholder="Contact person" v-model="form.contact_person">
            <span class="help alert-danger" v-if="form.errors.has('contact_person')" v-text="form.errors.get('contact_person')"></span>

            <input type="text" id="referred_by" name="referred_by" placeholder="Referred by" v-model="form.referred_by">
            <span class="help alert-danger" v-if="form.errors.has('referred_by')" v-text="form.errors.get('referred_by')"></span>
            <div class="half left cf">
                <input type="tel" id="phone" name="phone"placeholder="Contact Phone" v-model="form.phone" v-mask="'###-###-####'"> 
                <span class="help alert-danger" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></span>
            </div>
            
            <div class="half right cf">
                <input type="email" id="email" name="email" placeholder="Contact email" v-model="form.email">
                <span class="help alert-danger" v-show="form.errors.has('email')" v-text="form.errors.get('email')"></span>
            </div>

            <select>
                  <option disabled selected value="" class="placeholder">Please select relationship of contact person to client...</option>
                  <option>Myself</option>
                  <option>Mother</option>
                  <option>Father</option>
                  <option>Relative</option>
                  <option>A Friend</option>
                  <option>Other</option>
            </select>
            <div class="radio-select">
                 <label class="control-label">Present location of client</label><br>
                <label class="radio-inline">
                  <input type="radio" value="Hospital" v-model="present_location"> Hospital
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Nursing Home" v-model="present_location"> Nursing Home
                </label>
                <label class="radio-inline">
                  <input type="radio" value="At Home" v-model="present_location"> At Home
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Assisted Living Facility" v-model="present_location"> Assisted Living Facility
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Other" v-model="present_location"> Other
                </label>
            </div>

            <input v-show="present_location == 'Other'" type="text" placeholder="Please specify client's location">

            <select>
                  <option disabled selected value="" class="placeholder">Please select type of care desired...</option>
                  <option>Residential Care Home</option>
                  <option>Assisted Living Home</option>
                  <option>Independent Senior Living</option>
                  <option>Nursing Care Home</option>
                  <option>Hospice Care Home</option>
                  <option>Adult Care Home</option>
                  <option>Skilled Nursing Facility or Convalescent Hospital</option>
            </select>

            <div class="radio-select">
                 <label class="control-label">Client's Condition</label><br>
                <label class="radio-inline">
                  <input type="radio" value="Alert" v-model="condition"> Alert
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Confused" v-model="condition"> Confused
                </label>
            </div>

            <select v-show="condition == 'Confused'">
                  <option selected value="" class="placeholder">Please select if applies...</option>
                  <option>Dimentia</option>
                  <option>Alzheimer's</option>
                  <option>Mild Cognitive Impairment</option>
            </select>

            <div class="radio-select">
                 <label class="control-label">Client's Walking Ability</label><br>
                <label class="radio-inline">
                  <input type="radio" value="Ambulatory" v-model="canWalk"> No help
                </label>
                <label class="radio-inline">
                  <input type="radio" value="NonAmbulatory" v-model="canWalk"> With help of mobility device
                </label>
            </div>

            <select v-show="canWalk == 'NonAmbulatory'">
                  <option selected value="" class="placeholder">Please select mobility device if applies...</option>
                  <option>Manual Wheel Chair</option>
                  <option>Motorized Wheel Chair</option>
                  <option>Scooter</option>
                  <option>Walker</option>
                  <option>Cane</option>
            </select>
            
            <button type="button" class="btn btn-primary btn-lg btn-block" id="input-submit" @click="onSubmit">
                <span class="buttonText">Submit</span>
                <span class="buttonLoadingImage hiddenButtonElement"></span>
            </button>

            <div class="captcha">
                <div class="g-recaptcha" data-sitekey="6LfPrWEUAAAAAEDIBvCcd9Y7ktvgTFXa5114CYm_"></div>
            </div>
             <span class="help alert-danger" v-if="form.errors.has('g_recaptcha_response')" v-text="form.errors.get('g_recaptcha_response')"></span>

        </form>
    </div>
</template>

<script>
    import Form from '../utils/Form';
    import {mask} from 'vue-the-mask'
    export default {
        directives: {mask},
        mounted() {
            $("select").change(function(){
                if ($(this).val()=="") $(this).css({color: "#757575"});
                else $(this).css({color: "#000"});
              });
        },

        data() {
            return {
                form: new Form({
                    name: '',
                    contact_person: '',
                    referred_by: '',
                    phone: '',
                    email: '',
                    g_recaptcha_response: '',
                }),
                present_location: "",
                condition: "",
                canWalk: "",

                message: "",
                alertType: "",
                messageClass: "message-default"
            };
        },

        methods: {
            onSubmit() {

               this.form.g_recaptcha_response = grecaptcha.getResponse();
               this.showFixedAlert('Submitting form.  Please wait...', 'info');
               this.disableButtons();
               this.showSpinner('#input-submit');
               this.form.post('/client-form')
                    .then(response => {
                        this.showFixedAlert(response.message, 'success');
                       this.enableButtons();
                       window.grecaptcha.reset();
                    })
                    .catch(response => {
                        this.showFixedAlert(response.message, 'danger');
                        this.enableButtons();
                        if(grecaptcha.getResponse()) {
                            grecaptcha.reset();
                        }
                       
                    });

            }
        }
    }
</script>
<style>
    select {
      color: #757575;
    }

    .radio-select {
        background: white;
    }

    input[type="radio"]{
        -webkit-appearance: radio;
        width: inherit;
    }

    .message-default {
        margin-top: .7em !important;
    }

    .message-succes {
        color: green;
    }

    .message-fail {
        color: red
    }

    .message-info {
        color: blue
    }
</style>
