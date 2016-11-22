<template>
    <section class="panel">
        <div class="panel-body">
            <div class="col-md-6">
                <h4>Mijn gegevens</h4>
                <form>
                    <div class="form-group">
                        <label for="username">Gebruikersnaam</label>
                        <input disabled type="text" name="username" id="username" class="form-control" v-model="username">
                        <p class="text-danger" v-if="errors.username">{{ errors.username[0] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="name">Voornaam</label>
                        <input type="text" name="name" id="name" class="form-control" v-model="first_name">
                        <p class="text-danger" v-if="errors.name">{{ errors.name[0] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Achternaam</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" v-model="last_name">
                        <p class="text-danger" v-if="errors.last_name">{{ errors.last_name[0] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" v-model="email">
                        <p class="text-danger" v-if="errors.email">{{ errors.email[0] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefoon</label>
                        <input type="phone" name="phone" id="phone" class="form-control" v-model="phone">
                        <p class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</p>
                    </div>
                    <div class="form-group pull-right">
                        <button v-if="updating" class="btn btn-success" disabled>Opslaan... <i class="fa fa-spin fa-spinner"></i></button>
                        <button v-else class="btn btn-success" @click="updateUser()">Opslaan</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h4>Mijn wachtwoord</h4>
                <form>
                    <div class="form-group">
                        <label for="password">Nieuw wachtwoord</label>
                        <input type="password" name="password" id="password" v-model="password" class="form-control">
                        <p class="text-danger" v-if="errors.password">{{ errors.password[0] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmeer wachtwoord</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" v-model="password_confirmation" class="form-control">
                        <p class="text-danger" v-if="errors.password_confirmation">{{ errors.password_confirmation[0] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="old_password">Huidig wachtwoord</label>
                        <input type="password" name="old_password" id="old_password" v-model="old_password" class="form-control">
                        <p class="text-danger" v-if="errors.old_password">{{ errors.old_password[0] }}</p>
                    </div>
                    <div class="form-group pull-right">
                        <button v-if="updating_password" class="btn btn-warning" disabled>Wijzigen... <i class="fa fa-spin fa-spinner"></i></button>
                        <button v-else @click="updatePassword()" class="btn btn-warning">Wachtwoord wijzigen</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data: function() {
            return {
                user_id: window.vogelzang.auth.user.id,
                token: window.vogelzang.auth.jwt,
                user: [],
                first_name: '',
                last_name: '',
                email: '',
                username: '',
                phone: '',
                updating: false,
                errors: [],
                password: '',
                password_confirmation: '',
                old_password: '',
                updating_password: false,
                errors: [],
            }
        },

        ready: function() {
            $.getJSON('/api/users/' + this.user_id, function(user) {
                this.user = user.data;
                this.first_name = user.data.first_name;
                this.last_name = user.data.last_name;
                this.email = user.data.email;
                this.username = user.data.username;
                this.phone = user.data.phone;
            }.bind(this));
        },

        methods: {
            updateUser: function() {
                this.updating = true;

                var data = {
                    "first_name": this.first_name,
                    "last_name": this.last_name,
                    "email": this.email,
                    "username": this.username,
                    "phone": this.phone,
                }

                var vm = this;

                $.ajax({
                    url: '/api/users/' + vm.user_id + '?token=' + vm.token,
                    method: 'put',
                    data: data,
                    success: function(user) {
                        vm.user = user.data;
                        vm.updating = false;
                    }.bind(vm),
                    error: function (errors) {
                        vm.errors = errors.responseJSON.errors;
                        vm.updating = false;
                    }.bind(vm)
                })
            },

            updatePassword: function() {
                this.updating_password = true;

                var data = {
                    "password": this.password,
                    "password_confirmation": this.password_confirmation,
                    "old_password": this.old_password,
                }

                var vm = this;

                $.ajax({
                    url: '/api/users/' + vm.user_id + '/update-password',
                    method: 'put',
                    data: data,
                    success: function(user) {
                        vm.user = user.data;
                        vm.updating_password = false;
                    }.bind(vm),
                    error: function (errors) {
                        vm.errors = errors.responseJSON.errors;
                        vm.updating_password = false;
                    }.bind(vm)
                })
            },
        },
    }
</script>
