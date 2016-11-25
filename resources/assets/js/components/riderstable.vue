<template id="riderstable">
    <section class="panel">
        <header class="panel-heading">
            {{ total }} ruiters geregistreerd.
            <span class="tools pull-right">
                <input class="form-control" type="text" name="search" id="search" v-on:keyUp="searchRider()" debounce="50" v-model="query" placeholder="Zoeken...">
            </span>
        </header>
        <div class="panel-body">
            <table class="table  table-hover general-table">
                <thead>
                    <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Leeftijd</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="rider in riders">
                        <td>{{ rider.first_name }}</td>
                        <td>{{ rider.last_name }}</td>
                        <td>{{ rider.age }}</td>
                        <td class="buttons-cell">
                            <a href="#" class="btn btn-info btn-xs" @click="setRiderToShow(rider)" data-toggle="modal" data-target="#showRider">
                                <i class="fa fa-eye"></i>
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

    <div class="modal fade" id="showRider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content" v-if="! riderToShow == ''">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">{{ riderToShow.first_name }}  {{ riderToShow.last_name}}</h4>
                </div>
                <div class="modal-body">
                    <h4>Statistieken</h4>
                    <b>Ingeschreven lessen: </b> {{ riderToShow.subscriptionRelation.data.length }}
                    <hr>
                    <h4>Gebruiker</h4>
                    <b>Naam: </b> {{ riderToShow.userRelation.data.first_name }} {{ riderToShow.userRelation.data.last_name }}
                    <br>
                    <b>Gebruikersnaam: </b> {{ riderToShow.userRelation.data.username }} <br>
                    <b>Email: </b> <a href="mailto:{{ riderToShow.userRelation.data.email }}">{{ riderToShow.userRelation.data.email }}</a>
                    <br>
                    <b>Telefoon: </b> {{ riderToShow.userRelation.data.phone }}
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>
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
                total: 0,
                max_pages: 1,
                loading: true,
                page: 1,
                query: '',
                loading: false,
                riderToShow: '',
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

                        $.getJSON('/api/riders?page=' + vm.page, function (riders) {
                            vm.loading = false;
                            riders.data.map(function (rider) {
                                vm.riders.push(rider);
                            });
                        }.bind(vm));
                    }
                }
            });
        },

        methods: {
            fetchAllRecords: function() {
                $.getJSON('/api/riders', function(riders) {
                    this.total = riders.meta.pagination.total;
                    this.riders = riders.data;
                    this.max_pages = riders.meta.pagination.total_pages;
                    this.loading = false;
                }.bind(this));
            },

            searchRider: function() {
                var vm = this;
                this.loading = true;

                if (this.query === '') {
                    this.fetchAllRecords();
                } else {
                    $.getJSON('/api/riders?query=' + this.query, function(riders) {
                        vm.riders = riders.data;
                        vm.max_pages = riders.meta.pagination.total_pages;
                        vm.loading = false;
                    }.bind(vm));
                }
            },

            setRiderToShow: function(rider) {
                var vm = this;

                $.getJSON('/api/riders/' + rider.id + '?include=subscriptionRelation', function(result) {
                    vm.riderToShow = result.data;
                }.bind(vm));
            }
        },
    }
</script>
