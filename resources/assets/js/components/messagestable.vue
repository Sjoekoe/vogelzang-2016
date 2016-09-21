<template>
    <section class="panel">
        <header class="panel-heading">
            {{ total }} berichten.
        </header>
        <div class="panel-body">
            <table class="table  table-hover general-table">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Email</th>
                        <th>Onderwerp</th>
                        <th>Verzonden op</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="message in messages" v-bind:class="{ 'highlighted' : ! message.is_read }">
                        <td>{{ message.name }}</td>
                        <td>{{ message.email }}</td>
                        <td>{{ message.subject }}</td>
                        <td>{{ message.created_at}}</td>
                        <td>
                            <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#showMessage" @click="fillModalData(message)">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#removeMessage" @click="setMessageToRemove(message)">
                                <i class="fa fa-remove"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <div class="modal fade" id="showMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">{{ selectedSubject}} - {{ selectedName }} - <a
                            href="mailto::{{ selectedEmail }}">{{ selectedEmail }}</a></h4>
                </div>
                <div class="modal-body" v-html="selectedMessage"></div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="removeMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Ben je zeker dat je dit bericht wilt verwijderen?</h4>
                </div>
                <div class="modal-body">
                    {{ messageToRemove.subject }} - {{ messageToRemove.name }}
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>
                    <button class="btn btn-danger" type="button" @click="removeMessage(messageToRemove)">Verwijderen</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                messages: [],
                total: 0,
                selectedName: '',
                selectedMessage: '',
                selectedSubject: '',
                selectedEmail: '',
                messageToRemove: '',
            }
        },

        ready: function() {
            $.getJSON('/api/formentries', function(messages) {
                this.total = messages.meta.pagination.total;
                this.messages = messages.data;
            }.bind(this));
        },

        methods: {
            removeMessage: function(message) {
                this.messages.$remove(message);

                $("#removeMessage").toggleClass("in");
                $("body").removeClass("modal-open");
                $('.modal-backdrop').removeClass('in');

                this.total = this.total - 1;

                $.ajax({
                    url: 'api/formentries/' + message.id,
                    method: 'post',
                    data: {_method: 'delete'},
                })
            },

            fillModalData: function(message) {
                this.selectedName = message.name;
                this.selectedMessage = message.message;
                this.selectedSubject = message.subject;
                this.selectedEmail = message.email;
                message.is_read = true;

                $.ajax({
                    url: 'api/formentries/' + message.id + '/read',
                    method: 'post',
                })
            },

            setMessageToRemove: function(message) {
                this.messageToRemove = message;
            }
        },
    }
</script>
