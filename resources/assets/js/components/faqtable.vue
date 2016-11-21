<template>
    <section class="panel">
        <header class="panel-heading">
            {{ total }} Veelgestelde vragen.
            <span class="tools pull-right">
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#addFaq">
                    <i class="fa fa-plus"></i> Toevoegen
                </button>
            </span>
        </header>
        <div class="panel-body">
            <table class="table  table-hover general-table">
                <thead>
                <tr>
                    <th>Titel</th>
                    <th>Zichtbaar</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="faq in faqs">
                    <td>{{ faq.title }}</td>
                    <td><i v-bind:class="{ 'fa fa-check' : faq.visible, 'fa fa-remove text-danger' : ! faq.visible }"></i></td>
                    <td>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#removeFaq" @click="setFaqToRemove(faq)">
                            <i class="fa fa-remove"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

    <div class="modal fade" id="addFaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Veelgestelde vraag toevoegen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="control-label">Vraag</label>
                        <input type="text" name="title" id="title" class="form-control" v-model="title">
                    </div>
                    <div class="form-group">
                        <label for="content" class="control-label">Antwoord</label>
                        <textarea name="content" id="content" cols="30" rows="10" v-model="content" class="form-control"></textarea>
                        <p class="text-danger" v-if="errors.content">{{ errors.content[0] }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>

                    <button v-if="creating" disabled class="btn btn-primary" type="button">Aanmaken <i class="fa fa-spin fa-spinner"></i></button>
                    <button v-else class="btn btn-primary" type="button" @click="addFaq()">Toevoegen</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removeFaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Aankondiging verwijderen</h4>
                </div>
                <div class="modal-body">
                    Ben je zeker dat je deze vraag wilt verwijderen?
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Sluiten</button>
                    <button class="btn btn-danger" type="button" @click="removeFaq(faqToRemove)">Verwijderen</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                faqs: [],
                total: 0,
                creating: false,
                title: '',
                content: '',
                faqToRemove: '',
                errors: [],
            }
        },

        ready: function() {
            this.fetchAllRecords();
        },

        methods: {
            addFaq: function() {
                this.creating = true;

                var data = {
                    'content': this.content,
                    'title': this.title,
                }

                var vm = this;

                $.ajax({
                    url: '/api/faqs',
                    method: 'POST',
                    data: data,
                    success: function() {
                        vm.success = true;

                        vm.title = '';
                        vm.content = '';
                        vm.creating = false;

                        vm.fetchAllRecords();

                        $("#addFaq").toggleClass("in");
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
                $.getJSON('/api/faqs', function(faqs) {
                    this.faqs = faqs.data;
                    this.total = faqs.meta.pagination.total;
                }.bind(this));
            },

            setFaqToRemove: function(faq) {
                this.faqToRemove = faq;
            },

            removeFaq: function(faq) {
                this.faqs.$remove(faq);

                $("#removeFaq").toggleClass("in");
                $("body").removeClass("modal-open");
                $('.modal-backdrop').removeClass('in');

                this.total = this.total - 1;

                $.ajax({
                    url: '/api/faqs/' + faq.id,
                    method: 'post',
                    data: {_method: 'delete'},
                })
            },
        },
    }
</script>
