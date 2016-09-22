<template id="riderstable">
    <section class="panel">
        <header class="panel-heading">
            <div class="col-md-6">
                <h5>Lessenrooster</h5>
            </div>
            <span class="tools pull-right">
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#addRoster">
                    <i class="fa fa-plus"></i> Toevoegen
                </button>
            </span>
        </header>
        <div class="panel-body">
            <table class="table  table-hover general-table">
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
                    <h4 class="modal-title">{{ rosterToShow.date }} {{ rosterToShow.time}}</h4>
                </div>
                <div class="modal-body">
                    <div v-if="rosterToShow.subscriptionRelation.data.length" v-for="subscription in rosterToShow.subscriptionRelation.data">
                        <b>Naam:</b> {{ subscription.riderRelation.data.first_name }} {{ subscription.riderRelation.data.last_name}}
                    </div>
                    <div v-if="! rosterToShow.subscriptionRelation.data.length">
                        <b>Nog geen ruiters ingeschreven!</b>
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
</template>

<script>
    export default {
        data: function() {
            return {
                rosters: [],
                total: 0,
                max_pages: 1,
                loading: true,
                page: 1,
                rosterToShow: false,
                rosterToRemove: '',
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

                        $.getJSON('/api/rosters?include=subscriptionRelation&page=' + vm.page , function (rosters) {
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
            },

            fetchAllRecords: function() {
                var vm = this;
                $.getJSON('/api/rosters?include=subscriptionRelation', function(rosters) {
                    vm.total = rosters.meta.pagination.total;
                    vm.rosters = rosters.data;
                    vm.max_pages = rosters.meta.pagination.total_pages;
                    vm.loading = false;
                    vm.page = 1;
                }.bind(vm));
            },
        },
    }
</script>
