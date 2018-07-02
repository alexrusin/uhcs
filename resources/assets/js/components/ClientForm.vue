<template>
    <div>
        <form class="cf" @keydown="form.errors.clear($event.target.name)" @change="form.errors.clear($event.target.name)">
            
            <input type="text" id="name" name="name" placeholder="Client's name (required)" v-model="form.name">
            <span class="help alert-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
            <div class="half left cf">
                <input type="text" id="contact_person" name="contact_person" placeholder="Client's contact person (required)" v-model="form.contact_person">
                <span class="help alert-danger" v-if="form.errors.has('contact_person')" v-text="form.errors.get('contact_person')"></span>
            </div>
            <div class="half right cf">
                <input type="tel" id="date_of_birth" name="date_of_birth" placeholder="Client's DOB (mm/dd/yyyy)" v-model="form.date_of_birth" v-mask="'##/##/####'"> 
                <span class="help alert-danger" v-if="form.errors.has('date_of_birth')" v-text="form.errors.get('date_of_birth')"></span>
            </div>

            <input type="text" id="referred_by" name="referred_by" placeholder="Referred by" v-model="form.referred_by">
            <span class="help alert-danger" v-if="form.errors.has('referred_by')" v-text="form.errors.get('referred_by')"></span>
            <div class="half left cf">
                <input type="email" id="email" name="email" placeholder="Contact email (required)" v-model="form.email">
                <span class="help alert-danger" v-show="form.errors.has('email')" v-text="form.errors.get('email')"></span>
            </div>

            <div class="half right cf">
                <input type="tel" id="phone" name="phone" placeholder="Contact Phone" v-model="form.phone" v-mask="'###-###-####'"> 
                <span class="help alert-danger" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></span>
            </div>

            <select id="relationship_to_client" name="relationship_to_client" v-model="form.relationship_to_client">
                  <option disabled selected value="" class="placeholder">Please select relationship of contact person to client (required)</option>
                  <option value="Myself">Myself</option>
                  <option value="Spouse">Spouse</option>
                   <option value="Parent">Parent</option>
                  <option value="Relative">Relative</option>
                  <option value="Friend">Friend</option>
                  <option value="Other">Other</option>
            </select>
            <span class="help alert-danger" v-if="form.errors.has('relationship_to_client')" v-text="form.errors.get('relationship_to_client')"></span>
            
            <div class="radio-select">
                 <label class="control-label">Present location of client (required)</label><br>
                <label class="radio-inline">
                  <input type="radio" value="Hospital" v-model="form.present_location"> Hospital
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Nursing Home" v-model="form.present_location"> Nursing Home
                </label>
                <label class="radio-inline">
                  <input type="radio" value="At Home" v-model="form.present_location"> At Home
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Assisted Living Facility" v-model="form.present_location"> Assisted Living Facility
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Other" v-model="form.present_location"> Other
                </label>
            </div>
            <span class="help alert-danger" v-if="form.errors.has('present_location')" v-text="form.errors.get('present_location')"></span>

            <input v-show="form.present_location == 'Other'" type="text" id="present_location_specify" placeholder="Please specify client's location" v-model="form.present_location_specify">

            <select id="care_desired" name="care_desired" v-model="form.care_desired">
                  <option disabled selected value="" class="placeholder">Please select type of care desired (required)</option>
                  <option>Residential Care Home</option>
                  <option>Assisted Living Home</option>
                  <option>Independent Senior Living</option>
                  <option>Nursing Care Home</option>
                  <option>Hospice Care Home</option>
                  <option>Adult Care Home</option>
                  <option>Skilled Nursing Facility or Convalescent Hospital</option>
            </select>
            <span class="help alert-danger" v-if="form.errors.has('care_desired')" v-text="form.errors.get('care_desired')"></span>

            <div class="radio-select">
                 <label class="control-label">Client's Condition (required)</label><br>
                <label class="radio-inline">
                  <input type="radio" value="Alert" v-model="form.client_condition"> Alert
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Confused" v-model="form.client_condition"> Confused
                </label>
            </div>
             <span class="help alert-danger" v-if="form.errors.has('client_condition')" v-text="form.errors.get('client_condition')"></span>

            <select v-show="form.client_condition == 'Confused'" id="client_condition_specify" v-model="form.client_condition_specify">
                  <option selected value="" class="placeholder">Please select if applies...</option>
                  <option value="Dimentia">Dimentia</option>
                  <option value="Alzheimers">Alzheimer's</option>
                  <option value="Mild Cognitive Impairment">Mild Cognitive Impairment</option>
            </select>

            <div class="radio-select">
                 <label class="control-label">Client's Walking Ability (required)</label><br>
                <label class="radio-inline">
                  <input type="radio" value="Ambulatory" v-model="form.walking_ability"> No help needed
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Non-ambulatory" v-model="form.walking_ability"> With help of mobility device
                </label>
            </div>
             <span class="help alert-danger" v-if="form.errors.has('walking_ability')" v-text="form.errors.get('walking_ability')"></span>

            <select v-show="form.walking_ability == 'Non-ambulatory'" id="walking_ability_specify" v-model="form.walking_ability_specify">
                  <option selected value="" class="placeholder">Please select mobility device if applies...</option>
                  <option value="Manual Wheel Chair">Manual Wheel Chair</option>
                  <option value="Motorized Wheel Chair">Motorized Wheel Chair</option>
                  <option value="Scooter">Scooter</option>
                  <option value="Walker">Walker</option>
                  <option value="Cane">Cane</option>
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
                    date_of_birth: '',
                    referred_by: '',
                    phone: '',
                    email: '',
                    relationship_to_client:'',
                    present_location: '',
                    present_location_specify: '',
                    care_desired: '',
                    client_condition: '',
                    client_condition_specify: '',
                    walking_ability: '',
                    walking_ability_specify:'',
                    g_recaptcha_response: '',
                }),
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
        width: inherit;
    }
</style>
