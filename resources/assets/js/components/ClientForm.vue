<template>
    <div>
        <form class="cf" @keydown="form.errors.clear($event.target.name)">
            
            <input type="text" placeholder="Client's name" v-model="form.name">
            <span class="help alert-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
            
            <input type="text" placeholder="Contact person" v-model="form.contact_person">
            <span class="help alert-danger" v-if="form.errors.has('contact_person')" v-text="form.errors.get('contact_person')"></span>

            <input type="text" placeholder="Refered by" v-model="form.refered_by">
            <span class="help alert-danger" v-if="form.errors.has('refered_by')" v-text="form.errors.get('refered_by')"></span>

            <input type="text" placeholder="Phone" v-model="form.phone"> 
            <span class="help alert-danger" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></span>

            <input type="email" placeholder="Contact email" v-model="form.email">
            <span class="help alert-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>

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

            <input v-if="present_location == 'Other'" type="text" placeholder="Please specify client's location">

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

            <select v-if="condition == 'Confused'">
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

            <select v-if="canWalk == 'NonAmbulatory'">
                  <option selected value="" class="placeholder">Please select mobility device if applies...</option>
                  <option>Manual Wheel Chair</option>
                  <option>Motorized Wheel Chair</option>
                  <option>Scooter</option>
                  <option>Walker</option>
                  <option>Cane</option>
            </select>

            <button type="button" class="btn btn-primary btn-lg btn-block" id="input-submit" @click="onSubmit">Submit</button>
            <p v-if="message != ''" :class="[messageClass, alertType]">{{message}}</p>
        </form>
    </div>
</template>

<script>
    import Form from '../utils/Form';
    export default {
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
                    refered_by: '',
                    phone: '',
                    email: '',
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
               this.alertType = "message-info";
               this.message = "Submitting form. Please wait...";
               this.form.post('/client-form')
                    .then(response => {
                        this.message = response.message;
                        this.alertType = "message-success";
                    })
                    .catch(response => {
                        this.message = "There was an error processing your request";
                        this.alertType = "message-fail";
                        console.log(this.form.errors.has('name'));
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
