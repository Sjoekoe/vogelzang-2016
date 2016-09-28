<template id="riderstable">
    <section class="panel">
        <header class="panel-heading">
            {{ total }} gebruikers geregistreerd.
            <span class="tools pull-right">
                <input type="text" name="search" id="serach" v-on:keyUp="searchUser()" v-model="query">
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#addUser">
                    <i class="fa fa-plus"></i> Toevoegen
                </button>
            </span>
        </header>
        <div class="panel-body">
            <table class="table  table-hover general-table">
                <thead>
                <tr>
                    <th>Gebruikersnaam</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Active</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users">
                    <td>{{ user.username }}</td>
                    <td>{{ user.first_name }}</td>
                    <td>{{ user.last_name }}</td>
                    <td><a href="mailto:{{ user.email }}">{{ user.email }}</a></td>
                    <td><i v-bind:class="{ 'fa fa-check text-success' : user.active, 'fa fa-remove text-danger' : ! user.active }"></i></td>
                    <td>
                        <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#showUser" @click="setUserToShow(user)">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-warning btn-xs" @click="setUserToEdit(user)" data-toggle="modal" data-target="#editUser">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#removeUser" @click="setUserToRemove(user)">
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

    <div class="modal fade" id="removeUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Gebruiker verwijderen</h4>
                </div>
                <div class="modal-body">
                    Ben je zeker dat je {{ userToRemove.username }} wilt verwijderen?
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>
                    <button class="btn btn-danger" type="button" @click="removeUser(userToRemove)">Verwijderen</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">{{ userToShow.username }}</h4>
                </div>
                <div class="modal-body">
                    <b>Naam: </b> {{ userToShow.last_name }} <br>
                    <b>Voornaam: </b> {{ userToShow.first_name }} <br>
                    <b>Email: </b> <a href="mailto:{{ userToShow.email }}">{{ userToShow.email }}</a>
                    <br> <br>
                    <h4 class="modal-title">Ruiters</h4>

                    <div v-for="rider in userToShow.riderRelation.data">
                        <b>Naam:</b> {{ rider.first_name }} {{ rider.last_name}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button v-if="resetting" disabled class="btn btn-warning"><i class="fa fa-key"></i> Een ogenblik... <i class="fa fa-spin fa-spinner"></i></button>
                    <button v-else class="btn btn-warning" @click="resetPassword(userToShow)"><i class="fa fa-key"></i> Wachtwoord resetten</button>

                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Gebruiker toevoegen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="username" id="username" v-model="username" class="form-control" placeholder="Gebruikersnaam">
                    </div>
                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" v-model="first_name" class="form-control" placeholder="Voornaam">
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" id="last_name" v-model="last_name" class="form-control" placeholder="Achternaam">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" v-model="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <select name="level_id" id="level_id" v-model="level_id" class="form-control">
                            <option value="1">Gebruiker</option>
                            <option value="2">Lesgever</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>

                    <button v-if="creating" disabled class="btn btn-primary" type="button">Aanmaken <i class="fa fa-spin fa-spinner"></i></button>
                    <button v-else class="btn btn-primary" type="button" @click="addUser()">Toevoegen</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">{{ userToEdit.username }} wijzigen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input disabled type="text" name="username" id="username" v-model="username" class="form-control" placeholder="Gebruikersnaam">
                    </div>
                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" v-model="first_name" class="form-control" placeholder="Voornaam">
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" id="last_name" v-model="last_name" class="form-control" placeholder="Achternaam">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" v-model="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <select name="level_id" id="level_id" v-model="level_id" class="form-control">
                            <option value="1">Gebruiker</option>
                            <option value="2">Lesgever</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>

                    <button v-if="creating" disabled class="btn btn-primary" type="button">Wijzigen <i class="fa fa-spin fa-spinner"></i></button>
                    <button v-else class="btn btn-primary" type="button" @click="editUser(userToEdit)">Wijzigen</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                users: [],
                total: 0,
                max_pages: 1,
                loading: true,
                page: 1,
                userToRemove: '',
                userToShow: '',
                username: '',
                email: '',
                first_name: '',
                last_name: '',
                level_id: 1,
                creating: false,
                query: '',
                resetting: false,
                userToEdit: '',
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

                        $.getJSON('/api/users?page=' + vm.page + '&query=' + vm.query, function (users) {
                            vm.loading = false;
                            users.data.map(function (user) {
                                vm.users.push(user);
                            });
                        }.bind(vm));
                    }
                }
            });
        },

        methods: {
            setUserToRemove: function(user) {
                this.userToRemove = user;
            },

            removeUser: function(user) {
                this.users.$remove(user);

                $("#removeUser").toggleClass("in");
                $("body").removeClass("modal-open");
                $('.modal-backdrop').removeClass('in');

                this.total = this.total - 1;

                $.ajax({
                    url: 'api/users/' + user.id,
                    method: 'post',
                    data: {_method: 'delete'},
                })
            },

            addUser: function() {
                this.creating = true;

                var data = {
                    "username": this.username,
                    'email': this.email,
                    'first_name': this.first_name,
                    'last_name': this.last_name,
                    'level_id': this.level_id,
                }

                var vm = this;

                $.ajax({
                    url: '/api/users',
                    method: 'POST',
                    data: data,
                    success: function() {
                        vm.success = true;

                        vm.name = '';
                        vm.email = '';
                        vm.creating = false;

                        vm.fetchAllRecords();

                        $("#addUser").toggleClass("in");
                        $("body").removeClass("modal-open");
                        $('.modal-backdrop').removeClass('in');

                    }.bind(vm),
                    error: function(errors) {
                        vm.errors = errors.responseJSON.errors;
                        vm.sending = false;
                    }.bind(vm)
                })
            },

            fetchAllRecords: function() {
                var vm = this;
                $.getJSON('/api/users', function(users) {
                    vm.total = users.meta.pagination.total;
                    vm.users = users.data;
                    vm.max_pages = users.meta.pagination.total_pages;
                    vm.loading = false;
                    vm.page = 1;
                }.bind(vm));
            },

            searchUser: function() {
                var vm = this;
                this.loading = true;

                if (this.query === '') {
                    this.fetchAllRecords();
                } else {
                    $.getJSON('/api/users?query=' + this.query, function(users) {
                        vm.users = users.data;
                        vm.max_pages = users.meta.pagination.total_pages;
                        vm.loading = false;
                    }.bind(vm));
                }
            },

            setUserToShow: function(user) {
                var vm = this;

                $.getJSON('/api/users/' + user.id + '?include=riderRelation', function(user) {
                    vm.userToShow = user.data;
                }.bind(vm));
            },

            resetPassword: function (user) {
                this.resetting = true;

                var vm = this;

                $.ajax({
                    url: '/api/users/' + user.id + '/reset-password',
                    method: 'get',
                    success: function (user) {
                        vm.resetting = false
                    }.bind(vm)
                })
            },

            setUserToEdit: function(user) {
                this.userToEdit = user;
                this.username = user.username;
                this.first_name = user.first_name;
                this.last_name = user.last_name;
                this.level_id = user.level;
                this.email = user.email;
            },

            editUser: function(user) {
                this.creating = true;

                var data = {
                    "username": this.username,
                    'email': this.email,
                    'first_name': this.first_name,
                    'last_name': this.last_name,
                    'level_id': this.level_id,
                };

                var vm = this;

                $.ajax({
                    url: '/api/users/' + user.id,
                    method: 'PUT',
                    data: data,
                    success: function() {
                        vm.success = true;

                        vm.name = '';
                        vm.email = '';
                        vm.first_name = '';
                        vm.last_name = '';
                        vm.username = '';
                        vm.level_id = 1;
                        vm.creating = false;

                        vm.fetchAllRecords();

                        $("#editUser").toggleClass("in");
                        $("body").removeClass("modal-open");
                        $('.modal-backdrop').removeClass('in');

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
