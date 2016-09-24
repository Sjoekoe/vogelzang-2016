<template id="riderstable">
    <section class="panel">
        <header class="panel-heading">
            <div class="col-md-6">
                <h5>Lessenrooster</h5>
            </div>
            <span class="tools pull-right">
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#createRoster">
                    <i class="fa fa-plus"></i> Toevoegen
                </button>
            </span>
        </header>
        <div class="panel-body">
            <table class="table  table-hover general-table table-striped">
                <thead>
                <tr>
                    <th>Datum</th>
                    <th>Uur</th>
                    <th>Les</th>
                    <th>Inschrijvingen</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="roster in rosters">
                    <td>{{ roster.date }}</td>
                    <td>{{ roster.time }}</td>
                    <td>{{ roster.type }}</td>
                    <td>{{ roster.subscriptionRelation.data.length }} / {{ roster.limit }}</td>
                    <td>
                        <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#showRoster" @click="setRosterToShow(roster)">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#removeRoster" @click="setRosterToRemove(roster)">
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
                    <div v-if="subscriptions.length" v-for="subscription in subscriptions" class="clearfix mb15">
                        <b>Naam:</b> {{ subscription.riderRelation.data.first_name }} {{ subscription.riderRelation.data.last_name}}
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
                        <h4>Opmerkingen</h4>
                        <div v-html="rosterToShow.description"></div>
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

    <div class="modal fade" id="createRoster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Les Toevoegen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input v-model="date" type="text" class="datepicker form-control" name="date" placeholder="datum">
                    </div>

                    <div class="form-group">
                        <input v-model="time" type="text" class="timepicker form-control" name="time" placeholder="Uur">
                    </div>

                    <div class="form-group">
                        <select v-model="type" name="type" id="type" class="form-control">
                            <option value="1">Groepsles</option>
                            <option value="2">Ouderles</option>
                            <option value="3">Privé-les</option>
                            <option value="4">Springles</option>
                            <option value="5">Wandeling</option>
                            <option value="6">Dressuurles</option>
                            <option value="7">Groepsles voor gevorderden</option>
                            <option value="8">Springles voor gevorderden</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input v-model="limit" type="number" name="limit" id="limit" class="form-control" placeholder="Limiet">
                    </div>

                    <div class="form-group">
                        <textarea v-model="description" name="description" id="" cols="30" rows="10" class="form-control" placeholder="Opmerkingen"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>

                    <button v-if="creating" class="btn btn-success" type="button" disabled>Opslaan ... <i class="fa fa-spin fa-spinnen"></i></button>
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
                description: '',
                creating: false,
                token: window.vogelzang.auth.jwt,
                is_admin: window.vogelzang.auth.user.is_admin,
                subscriptions: [],
            }
        },

        ready: function() {
            this.fetchAllRecords();

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
            },

            createRoster: function() {
                this.creating = true;

                var data = {
                    'date': this.date,
                    'time': this.time,
                    'description': this.description,
                    'type': this.type,
                    'limit': this.limit,
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
                })
            }
        },
    }
</script>
