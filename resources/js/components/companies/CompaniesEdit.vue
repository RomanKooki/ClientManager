<!--
  - ClientManager
  -
  - @file CompaniesEdit.vue
  - @project ClientManager
  - @author Wayne Brummer
  -->

<!--
  - ClientManager
  -
  - @file CompaniesEdit.vue
  - @project ClientManager
  - @author Wayne Brummer
  -->


<template>
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Edit: {{company.name}}
                </div>
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="control-label">Company name</label>
                            <input type="text" v-model="company.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="control-label">Company address</label>
                            <input type="text" v-model="company.address" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="control-label">Company website</label>
                            <input type="text" v-model="company.website" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="control-label">Company email</label>
                            <input type="text" v-model="company.email_address" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="control-label">Company Image</label>
                            <input type="text" v-model="company.image_url" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="control-label">Company Contact</label>
                            <input type="text" v-model="company.contact" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <button class="btn btn-success">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;

            let id = app.$route.params.id;

            app.companyId = id;
            axios.get('/api/v1/companies/' + id)
                .then(function (resp) {
                    app.company = resp.data;
                })
                .catch(function () {
                    alert("Could not load your company")
                });
        },
        data: function () {
            return {
                companyId: null,
                company: {
                    name: '',
                    address: '',
                    website: '',
                    email_address: '',
                    image_url: '',
                    contact: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCompany = app.company;
                axios.patch('/api/v1/companies/' + app.companyId, newCompany)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company");
                    });
            }
        }
    }
</script>
