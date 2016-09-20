<template>
    <div class="col-md-8 to-animate">
        <h3 class="section-title">Stuur ons een bericht</h3>
        <p class="message" style="display: none;">Thanks for contacting us</p>
        <form class="contact-form">
            <div class="form-group">
                <label for="name" class="sr-only">Volledige naam</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Volledige naam" v-model="name">
                <p v-if="errors.name">{{ errors.name }}</p>
            </div>
            <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" v-model="email">
                <p v-if="errors.email">{{ errors.email }}</p>
            </div>
            <div class="form-group">
                <label for="subject" class="sr-only">Onderwerp</label>
                <input type="text" name="subject" class="form-control" id="subject" placeholder="Onderwerp" v-model="subject">
                <p v-if="errors.subject">{{ errors.subject }}</p>
            </div>
            <div class="form-group">
                <label for="message" class="sr-only">Bericht</label>
                <textarea class="form-control" name="message" id="message" rows="7" placeholder="Bericht" v-model="message"></textarea>
                <p v-if="errors.message">{{ errors.message }}</p>
            </div>
            <div class="form-group">
                <input v-if="! sending" type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Verzenden" @click="sendformentry">
                <button class="btn btn-send-message btn-md" v-else>Verwerken...</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                name: '',
                email: '',
                subject: '',
                message: '',
                sending: false,
                errors: [],
            }
        },

        ready() {

        },

        methods: {
            sendformentry: function(e) {
                e.preventDefault();
                this.sending = true;

                var data = {
                    "name": this.name,
                    'email': this.email,
                    'subject': this.subject,
                    'message': this.message,
                }

                var vm = this;

                $.ajax({
                    url: '/api/formentries',
                    method: 'POST',
                    data: data,
                    success: function() {
                        $('.message').css({
                            display: '',
                        });

                        vm.name = '';
                        vm.email = '';
                        vm.subject = '';
                        vm.message = '';
                        vm.sending = false;
                    }.bind(vm),
                    error: function(errors) {
                        vm.errors = errors.responseJSON.errors;
                        vm.sending = false;
                    }.bind(vm)
                })
            }
        },
    }
</script>
