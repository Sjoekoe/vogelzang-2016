<template>
    <section class="panel">
        <header class="panel-heading">
            Mijn ruiters
            <span class="tools pull-right">
                <button class="btn btn-info btn-xs" @click="clearValues()" data-toggle="modal" data-target="#addRider">
                    <i class="fa fa-plus"></i> Toevoegen
                </button>
            </span>
        </header>
        <div class="panel-body">
            <table class="table  table-hover general-table">
                <thead>
                    <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="rider in riders">
                        <td>{{ rider.first_name }}</td>
                        <td>{{ rider.last_name }}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editRider" @click="setRiderToUpdate(rider)">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <div class="panel" v-if="loading">
        <div class="panel-body text-center">
            Laden... <i class="fa fa-spin fa-spinner"></i>
        </div>
    </div>

    <div class="modal fade" id="addRider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Ruiter toevoegen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name" class="control-label">Voornaam</label>
                        <input type="text" name="first_name" id="first_name" v-model="first_name" class="form-control" placeholder="Voornaam">
                        <p class="text-danger" v-if="errors.first_name">{{ errors.first_name[0] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="control-label">Achternaam</label>
                        <input type="text" name="last_name" id="last_name" v-model="last_name" class="form-control" placeholder="Achternaam">
                        <p class="text-danger" v-if="errors.last_name">{{ errors.last_name[0] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="birth_day" class="control-label">Geboorte datum</label>
                        <input type="text" name="birth_day" id="birth_day" v-model="birth_day" class="form-control default-date-picker" placeholder="Geboortedatum">
                        <p class="text-danger" v-if="errors.birth_day">{{ errors.birth_day[0] }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>

                    <button v-if="creating" disabled class="btn btn-primary" type="button">Aanmaken <i class="fa fa-spin fa-spinner"></i></button>
                    <button v-else class="btn btn-primary" type="button" @click="addRider()">Toevoegen</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editRider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Ruiter wijzigen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name" class="control-label">Voornaam</label>
                        <input type="text" name="first_name" v-model="first_name" class="form-control" placeholder="Voornaam">
                        <p class="text-danger" v-if="errors.first_name">{{ errors.first_name[0] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="control-label">Achternaam</label>
                        <input type="text" name="last_name" v-model="last_name" class="form-control" placeholder="Achternaam">
                        <p class="text-danger" v-if="errors.last_name">{{ errors.last_name[0] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="birth_day" class="control-label">Geboorte datum</label>
                        <input type="text" name="birth_day" v-model="birth_day" class="form-control default-date-picker" placeholder="Geboortedatum">
                        <p class="text-danger" v-if="errors.birth_day">{{ errors.birth_day[0] }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>

                    <button v-if="creating" disabled class="btn btn-primary" type="button">Wijzigen <i class="fa fa-spin fa-spinner"></i></button>
                    <button v-else class="btn btn-primary" type="button" @click="updateRider(riderToUpdate)">Wijzigen</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                riders: [],
                loading: true,
                riderToShow: '',
                user_id: window.vogelzang.auth.user.id,
                first_name: '',
                last_name: '',
                birth_day: '',
                creating: false,
                token: window.vogelzang.auth.jwt,
                errors: [],
                riderToUpdate: '',
            }
        },

        ready: function() {
            this.fetchAllRecords();
        },

        methods: {
            fetchAllRecords: function() {
                $.getJSON('/api/users/' + this.user_id + '/riders', function(riders) {
                    this.riders = riders.data;
                    this.loading = false;
                }.bind(this));
            },

            setRiderToShow: function(rider) {
                var vm = this;

                $.getJSON('/api/riders/' + rider.id + '?include=subscriptionRelation', function(result) {
                    vm.riderToShow = result.data;
                }.bind(vm));
            },

            addRider: function() {
                this.creating = true;

                var data = {
                    "first_name": this.first_name,
                    "last_name": this.last_name,
                    "birth_day": this.birth_day,
                };

                var vm = this;

                $.ajax({
                    url: '/api/users/' + vm.user_id + '/riders?token=' + vm.token,
                    method: 'POST',
                    data: data,
                    success: function(rider) {
                        vm.first_name = '';
                        vm.last_name = '';

                        vm.fetchAllRecords();

                        $("#addRider").toggleClass("in");
                        $("body").removeClass("modal-open");
                        $('.modal-backdrop').removeClass('in');

                        vm.creating = false;
                    }.bind(vm),
                    error: function(errors) {
                        vm.errors = errors.responseJSON.errors;
                        vm.creating = false;
                    }.bind(vm)
                })
            },

            updateRider: function(rider) {
                this.creating = true;

                var data = {
                    "first_name": this.first_name,
                    "last_name": this.last_name,
                    "birth_day": this.birth_day,
                };

                var vm = this;

                $.ajax({
                    url: '/api/users/' + vm.user_id + '/riders/' + rider.id + '?token=' + vm.token,
                    method: 'put',
                    data: data,
                    success: function(rider) {
                        vm.first_name = '';
                        vm.last_name = '';

                        vm.fetchAllRecords();

                        $("#editRider").toggleClass("in");
                        $("body").removeClass("modal-open");
                        $('.modal-backdrop').removeClass('in');

                        vm.creating = false;
                    }.bind(vm),
                    error: function(errors) {
                        vm.errors = errors.responseJSON.errors;
                        vm.creating = false;
                    }.bind(vm)
                })
            },

            setRiderToUpdate: function (rider) {
                this.riderToUpdate = rider;
                this.first_name = rider.first_name;
                this.birth_day = rider.normal_formatted_birthday;
                this.last_name = rider.last_name;
            },

            clearValues: function() {
                this.first_name = '';
                this.birth_day = '';
                this.last_name = '';
            }
        },
    }
</script>
