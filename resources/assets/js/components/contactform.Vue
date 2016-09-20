<template>
    <div class="title-section text-center animated out" data-animation="fadeInUp" data-delay="0">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h2>Stuur ons een bericht</h2>
                <hr>
                <p>Wij proberen dan zo snel mogelijk te antwoorden op jou verzoek.</p>
            </div>
        </div> <!-- End row -->
    </div>

    <div class="form-wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- form fields -->
                <form class="animated out" data-animation="fadeInUp" data-delay="0">
                    <fieldset>
                        <div class="form-group">
                            <label for="name" class="sr-only">Volledige naam</label>
                            <input type="text" name="name" class="form-control br-b" id="name" placeholder="Volledige naam" v-model="name">
                            <p class="active" v-if="errors.name">{{ errors.name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" class="form-control br-b" id="email" placeholder="Email" v-model="email">
                            <p v-if="errors.email">{{ errors.email }}</p>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="sr-only">Onderwerp</label>
                            <input type="text" name="subject" class="form-control br-b" id="subject" placeholder="Onderwerp" v-model="subject">
                            <p v-if="errors.subject">{{ errors.subject }}</p>
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Bericht</label>
                            <textarea class="form-control br-b" name="message" id="message" rows="7" placeholder="Bericht" v-model="message"></textarea>
                            <p v-if="errors.message">{{ errors.message }}</p>
                        </div>
                    </fieldset>

                    <!-- submit button -->
                    <div class="form-group">
                        <input v-if="! sending" type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Verzenden" @click="sendformentry">
                        <button class="btn btn-send-message btn-md" v-else>Verwerken... <i class="fa fa-spin fa-spinner"></i></button>
                    </div>

                    <div v-if="success" id="alert">Bedankt voor je aanvraag!</div>

                </form>

            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->
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
                success: false
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
                        vm.success = true;

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
