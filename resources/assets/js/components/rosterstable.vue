<template id="riderstable">
    <section class="panel">
        <header class="panel-heading">
            <div class="col-md-6">
                <h5>Lessenrooster</h5>
            </div>
            <span class="tools pull-right" v-if="is_admin">
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#createRoster">
                    <i class="fa fa-plus"></i> Toevoegen
                </button>
            </span>
        </header>
        <div class="panel-body">
            <table class="table table-hover general-table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Datum</th>
                    <th>Uur</th>
                    <th>Les</th>
                    <th>Niveau</th>
                    <th>Inschrijvingen</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="roster in rosters">
                    <td>{{ roster.date }}</td>
                    <td>{{ roster.time }}</td>
                    <td>{{ roster.type }}</td>
                    <td>{{ roster.level }}</td>
                    <td>{{ roster.subscriptionRelation.data.length }} / {{ roster.limit }}</td>
                    <td class="buttons-cell">
                        <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#showRoster" @click="setRosterToShow(roster)">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="#" v-if="is_admin" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#updateRoster" @click="setRosterToShow(roster)">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a v-if="is_admin" href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#removeRoster" @click="setRosterToRemove(roster)">
                            <i class="fa fa-remove"></i>
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

    <div v-if="rosterToShow" class="modal fade" id="showRoster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">{{ rosterToShow.type}} - {{ rosterToShow.date }} om {{ rosterToShow.time }}</h4>
                </div>
                <div class="modal-body">
                    <div class="mb15 text-center">
                        {{ rosterToShow.subscriptionRelation.data.length }} / {{ rosterToShow.limit }}
                        <hr>
                    </div>
                    <h4 class="text-center">Ingeschreven ruiters</h4>
                    <div v-if="subscriptions.length" v-for="subscription in subscriptions" class="clearfix mb15">
                        <b> {{ subscription.riderRelation.data.first_name }} {{ subscription.riderRelation.data.last_name}} </b>
                        <span class="pull-right" v-if="is_admin">
                            <button class="btn btn-danger btn-xs" @click="removeSubscription(rosterToShow, subscription)">
                                <i class="fa fa-trash"></i>
                            </button>
                        </span>
                    </div>
                    <div v-if="! rosterToShow.subscriptionRelation.data.length">
                        <b>Nog geen ruiters ingeschreven!</b>
                    </div>
                    <div v-if="rosterToShow.description.length">
                        <hr>
                        <h4 class="text-center">Opmerkingen</h4>
                        <div v-html="rosterToShow.description"></div>
                    </div>
                    <hr>
                    <div v-if="rosterToShow.can_be_canceled">
                        <h4 class="text-center">Jou ruiters</h4>
                        <div class="clearfix mb15" v-for="rider in riders">
                            <b>{{ rider.first_name }} {{ rider.last_name }}</b>
                            <span class="pull-right">

                            <div v-if="! subscribing">
                                <span class="btn btn-warning btn-xs clickable-span" v-if="riderSubscribedToRoster(rider, rosterToShow)" @click="unSubscribeRider(rider, rosterToShow)">
                                    Uitschrijven
                                </span>

                                <span v-else class="btn btn-success btn-xs clickable-span" @click="subscribeRider(rider, rosterToShow)" v-if="! rosterToShow.limit_reached">
                                    Inschrijven
                                </span>
                            </div>

                            <div v-else>
                                <span class="btn btn-default btn-xs">
                                    <i class="fa fa-spin fa-spinner"></i>
                                </span>
                            </div>

                        </span>
                        </div>
                    </div>

                    <div class="alert alert-warning" v-if="! rosterToShow.can_be_canceled">
                        De les vindt plaats in minder dan 2 uur. Om in te schrijven of te annuleren, gelieve contact op te nemen met de vogelzang.
                    </div>
                    <div class="alert alert-info" v-if="rosterToShow.limit_reached">
                        De limiet voor deze les is bereikt.
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removeRoster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Wil je deze les verwijderen?</h4>
                </div>
                <div class="modal-body">
                    {{ rosterToRemove.type }} - {{ rosterToRemove.date }} om {{ rosterToRemove.time }}
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>
                    <button @click="removeRoster(rosterToRemove)" class="btn btn-danger" type="button">Verwijderen</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateRoster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Les Wijzigen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="date" class="control-label">Datum</label>
                        <input v-model="date" id="date" type="text" class="default-date-picker form-control" name="date" placeholder="datum">
                        <p class="text-danger" v-if="errors.date">{{ errors.date[0] }}</p>
                    </div>

                    <div class="form-group">
                        <label for="time" class="control-label">Uur</label>
                        <input v-model="time" type="text" class="timepicker form-control" name="time" placeholder="Uur">
                        <p class="text-danger" v-if="errors.time">{{ errors.time[0] }}</p>
                    </div>

                    <div class="form-group">
                        <label for="level" class="control-label">Niveau</label>
                        <select v-model="level" id="level" name="level" class="form-control">
                            <option value="1">Beginners</option>
                            <option value="2">Half-Gevorderden</option>
                            <option value="3">Gevorderden</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type" class="control-label">Type</label>
                        <select v-model="type" id="type" name="type" class="form-control">
                            <option value="1">Groepsles</option>
                            <option value="2">Ouderles</option>
                            <option value="3">Privé-les</option>
                            <option value="4">Springles</option>
                            <option value="9">Cavalettic</option>
                            <option value="5">Wandeling</option>
                            <option value="6">Dressuurles</option>
                            <option value="7">Groepsles voor gevorderden</option>
                            <option value="8">Springles voor gevorderden</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="limit" class="control-label">Limiet</label>
                        <input v-model="limit" type="number" name="limit" class="form-control" placeholder="Limiet">
                        <p class="text-danger" v-if="errors.limit">{{ errors.limit[0] }}</p>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label">Opmerkingen</label>
                        <textarea v-model="description" id="description" name="description" cols="30" rows="5" class="form-control" placeholder="Opmerkingen" v-html="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>

                    <button v-if="creating" class="btn btn-success" type="button" disabled>Wijzigen ... <i class="fa fa-spin fa-spinner"></i></button>
                    <button v-else @click="updateRoster(rosterToShow)" class="btn btn-success" type="button">Wijzigen</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createRoster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Les Toevoegen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="date" class="control-label">Datum</label>
                        <input v-model="date" type="text" class="default-date-picker form-control" name="date" placeholder="datum">
                        <p class="text-danger" v-if="errors.date">{{ errors.date[0] }}</p>
                    </div>

                    <div class="form-group">
                        <label for="time" class="control-label">Uur</label>
                        <input v-model="time" type="text" class="timepicker form-control" name="time" placeholder="Uur">
                        <p class="text-danger" v-if="errors.time">{{ errors.time[0] }}</p>
                    </div>

                    <div class="form-group">
                        <label for="level" class="control-label">Niveau</label>
                        <select v-model="level" name="level" class="form-control">
                            <option value="1">Beginners</option>
                            <option value="2">Half-Gevorderden</option>
                            <option value="3">Gevorderden</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type" class="control-label">Type</label>
                        <select v-model="type" name="type" class="form-control">
                            <option value="1">Groepsles</option>
                            <option value="2">Ouderles</option>
                            <option value="3">Privé-les</option>
                            <option value="4">Springles</option>
                            <option value="9">Cavaletti</option>
                            <option value="5">Wandeling</option>
                            <option value="6">Dressuurles</option>
                            <option value="7">Groepsles voor gevorderden</option>
                            <option value="8">Springles voor gevorderden</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="limit" class="control-label">Limiet</label>
                        <input v-model="limit" type="number" name="limit" id="limit" class="form-control" placeholder="Limiet">
                        <p class="text-danger" v-if="errors.limit">{{ errors.limit[0] }}</p>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label">Opmerkingen</label>
                        <textarea v-model="description" name="description" id="" cols="30" rows="5" class="form-control" placeholder="Opmerkingen"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>

                    <button v-if="creating" class="btn btn-success" type="button" disabled>Opslaan ... <i class="fa fa-spin fa-spinner"></i></button>
                    <button v-else @click="createRoster()" class="btn btn-success" type="button">Opslaan</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                rosters: [],
                errors: [],
                total: 0,
                max_pages: 1,
                loading: true,
                page: 1,
                rosterToShow: false,
                rosterToRemove: '',
                date: '',
                time: '',
                limit: 12,
                type: 1,
                level: 1,
                description: '',
                creating: false,
                token: window.vogelzang.auth.jwt,
                is_admin: window.vogelzang.auth.user.is_admin,
                user_id: window.vogelzang.auth.user.id,
                subscriptions: [],
                riders: [],
                subscribing: false
            }
        },

        ready: function() {
            this.fetchAllRecords();
            this.fetchRiders();

            var vm = this;

            $(window).scroll(function() {
                if (vm.loading == false && vm.page < vm.max_pages) {
                    if ($(document).height() <= ($(window).height() + $(window).scrollTop())) {
                        vm.loading = true;
                        vm.page += 1;

                        $.getJSON('/api/rosters?include=subscriptionRelation&page=' + vm.page + '&token=' + vm.token , function (rosters) {
                            vm.loading = false;
                            rosters.data.map(function (roster) {
                                vm.rosters.push(roster);
                            });
                        }.bind(vm));
                    }
                }
            });
        },

        methods: {
            removeRoster: function(roster) {
                this.rosters.$remove(roster);

                $("#removeRoster").toggleClass("in");
                $("body").removeClass("modal-open");
                $('.modal-backdrop').removeClass('in');

                this.total = this.total - 1;

                $.ajax({
                    url: 'api/rosters/' + roster.id,
                    method: 'post',
                    data: {_method: 'delete'},
                })
            },

            setRosterToRemove: function(roster) {
                this.rosterToRemove = roster;
            },

            setRosterToShow: function(roster) {
                this.rosterToShow = roster;
                this.subscriptions = roster.subscriptionRelation.data;
                this.date = roster.date_for_validation;
                this.time = roster.time;
                this.limit = roster.limit;
                this.type = roster.type_not_formatted;
                this.description = roster.description;
            },

            createRoster: function() {
                this.creating = true;

                var data = {
                    'date': this.date,
                    'time': this.time,
                    'description': this.description,
                    'type': this.type,
                    'limit': this.limit,
                    'level': this.level,
                }

                var vm = this;

                $.ajax({
                    url: '/api/rosters',
                    method: 'POST',
                    data: data,
                    success: function() {
                        vm.success = true;

                        vm.date = '';
                        vm.time = '';
                        vm.description = '';
                        vm.type = 1;
                        vm.limit = 12;
                        vm.creating = false;
                        vm.level = 1;

                        vm.fetchAllRecords();

                        $("#createRoster").toggleClass("in");
                        $("body").removeClass("modal-open");
                        $('.modal-backdrop').removeClass('in');

                    }.bind(vm),
                    error: function(errors) {
                        vm.errors = errors.responseJSON.errors;
                        vm.creating = false;
                    }.bind(vm)
                })
            },

            fetchAllRecords: function() {
                var vm = this;
                $.getJSON('/api/rosters?include=subscriptionRelation&token=' + this.token, function(rosters) {
                    vm.total = rosters.meta.pagination.total;
                    vm.rosters = rosters.data;
                    vm.max_pages = rosters.meta.pagination.total_pages;
                    vm.loading = false;
                    vm.page = 1;
                }.bind(vm));
            },

            removeSubscription: function (roster, subscription) {
                this.subscriptions.$remove(subscription);

                $.ajax({
                    url: 'api/rosters/' + roster.id + '/subscriptions/' + subscription.id,
                    method: 'post',
                    data: {_method: 'delete'},
                });
            },

            fetchRiders: function() {
                var vm = this;
                $.getJSON('/api/users/' + vm.user_id + '/riders' , function(riders) {
                    vm.riders = riders.data;
                }.bind(vm));
            },

            riderSubscribedToRoster: function (rider, roster) {
                for (var i = 0; i < this.subscriptions.length; i++) {
                    if (roster.subscriptionRelation.data[i].riderRelation.data.id == rider.id) {
                        return true
                    }
                }

                return false;
            },

            subscribeRider: function(rider, roster) {
                var data = {
                    'rider_id': rider.id,
                }
                this.subscribing = true;

                var vm = this;

                $.ajax({
                    url: '/api/rosters/' + roster.id + '/subscriptions',
                    method: 'post',
                    data: data,
                    success: function(subscription) {
                        vm.findSingleRoster(subscription.data.rosterRelation.data);
                        vm.fetchRiders();
                        vm.fetchAllRecords();
                        vm.subscribing = false;
                    }.bind(vm),
                })
            },

            unSubscribeRider: function (rider, roster) {
                this.subscribing = true;
                var vm = this;

                $.getJSON('/api/riders/' + rider.id + '/rosters/' + roster.id , function(subscription) {
                    vm.removeSubscription(roster, subscription.data);
                    vm.subscribing = false;
                }.bind(vm));
            },

            findSingleRoster: function(roster) {
                var vm = this;

                $.ajax({
                    url: '/api/rosters/' + roster.id + '?include=subscriptionRelation',
                    method: 'get',
                    success: function (roster) {
                        vm.setRosterToShow(roster.data);
                    }.bind(vm),
                })
            },

            removeSubscription: function(roster, subscription) {
                var vm = this;

                $.ajax({
                    url: 'api/rosters/' + roster.id + '/subscriptions/' + subscription.id,
                    method: 'post',
                    data: {_method: 'delete'},
                    success: function() {
                        vm.findSingleRoster(roster);
                        vm.fetchRiders();
                        vm.fetchAllRecords();
                    }.bind(vm)
                });
            },

            updateRoster: function(roster) {
                this.creating = true;

                var data = {
                    'date': this.date,
                    'time': this.time,
                    'description': this.description,
                    'type': this.type,
                    'limit': this.limit,
                    'level': this.level,
                }

                var vm = this;

                $.ajax({
                    url: '/api/rosters/' + roster.id,
                    method: 'PUT',
                    data: data,
                    success: function() {
                        vm.success = true;

                        vm.date = '';
                        vm.time = '';
                        vm.description = '';
                        vm.type = 1;
                        vm.limit = 12;
                        vm.creating = false;
                        vm.level = 1;

                        vm.fetchAllRecords();

                        $("#updateRoster").toggleClass("in");
                        $("body").removeClass("modal-open");
                        $('.modal-backdrop').removeClass('in');

                    }.bind(vm),
                    error: function(errors) {
                        vm.errors = errors.responseJSON.errors;
                        vm.creating = false;
                    }.bind(vm)
                })
            }
        },
    }
</script>
