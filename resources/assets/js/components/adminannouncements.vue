<template>
    <section class="panel">
        <header class="panel-heading">
            {{ total }} Aankondigingen.
            <span class="tools pull-right">
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#addAnnouncement">
                    <i class="fa fa-plus"></i> Toevoegen
                </button>
            </span>
        </header>
        <div class="panel-body">
            <table class="table  table-hover general-table">
                <thead>
                <tr>
                    <th>Bericht</th>
                    <th>Door</th>
                    <th>Verzonden op</th>
                    <th>Zichtbaar</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="announcement in announcements">
                    <td>{{ announcement.body }}</td>
                    <td>{{ announcement.userRelation.data.username }}</td>
                    <td>{{ announcement.created_at}}</td>
                    <td><i v-bind:class="{ 'fa fa-check' : announcement.visible, 'fa fa-remove text-danger' : ! announcement.visible }"></i></td>
                    <td>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#removeAnnouncement" @click="setAnnouncementToRemove(announcement)">
                            <i class="fa fa-remove"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

    <div class="modal fade" id="addAnnouncement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Aankondiging toevoegen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="body" class="control-label">Bericht</label>
                        <textarea name="body" id="body" cols="30" rows="10" v-model="body" class="form-control"></textarea>
                        <p class="text-danger" v-if="errors.body">{{ errors.body[0] }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>

                    <button v-if="creating" disabled class="btn btn-primary" type="button">Aanmaken <i class="fa fa-spin fa-spinner"></i></button>
                    <button v-else class="btn btn-primary" type="button" @click="addAnnouncement()">Toevoegen</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removeAnnouncement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Aankondiging verwijderen</h4>
                </div>
                <div class="modal-body">
                    Ben je zeker dat je dit bericht wilt verwijderen?
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>
                    <button class="btn btn-danger" type="button" @click="removeAnnouncement(announcementToRemove)">Verwijderen</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                announcements: [],
                total: 0,
                creating: false,
                body: '',
                token: window.vogelzang.auth.jwt,
                announcementToRemove: '',
                errors: [],
            }
        },

        ready: function() {
            this.fetchAllRecords();
        },

        methods: {
            addAnnouncement: function() {
                this.creating = true;

                var data = {
                    'body': this.body,
                }

                var vm = this;

                $.ajax({
                    url: '/api/admin/announcements?token=' + vm.token,
                    method: 'POST',
                    data: data,
                    success: function() {
                        vm.success = true;

                        vm.body = '';
                        vm.creating = false;

                        vm.fetchAllRecords();

                        $("#addAnnouncement").toggleClass("in");
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
                $.getJSON('/api/admin/announcements', function(announcements) {
                    this.announcements = announcements.data;
                    this.total = announcements.meta.pagination.total;
                }.bind(this));
            },

            setAnnouncementToRemove: function(announcement) {
                this.announcementToRemove = announcement;
            },

            removeAnnouncement: function(announcement) {
                this.announcements.$remove(announcement);

                $("#removeAnnouncement").toggleClass("in");
                $("body").removeClass("modal-open");
                $('.modal-backdrop').removeClass('in');

                this.total = this.total - 1;

                $.ajax({
                    url: '/api/admin/announcements/' + announcement.id,
                    method: 'post',
                    data: {_method: 'delete'},
                })
            },
        },
    }
</script>
