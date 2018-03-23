<!--
  - ClientManager
  -
  - @file CompaniesIndex.vue
  - @project ClientManager
  - @author Wayne Brummer
  -->

<!--
  - ClientManager
  -
  - @file CompaniesIndex.vue
  - @project ClientManager
  - @author Wayne Brummer
  -->


<template>
    <b-container fluid>
        <!-- User Interface controls -->
        <b-row>
            <b-col md="6" class="my-1">
                <b-form-group horizontal label="Filter" class="mb-0">
                    <b-input-group>
                        <b-form-input v-model="filter" placeholder="Type to Search" />
                        <b-input-group-append>
                            <b-btn :disabled="!filter" @click="filter = ''">Clear</b-btn>
                        </b-input-group-append>
                    </b-input-group>
                </b-form-group>
            </b-col>
            <b-col md="6" class="my-1">
                <b-form-group horizontal label="Sort" class="mb-0">
                    <b-input-group>
                        <b-form-select v-model="sortBy" :options="sortOptions">
                            <option slot="first" :value="null">-- none --</option>
                        </b-form-select>
                        <b-form-select :disabled="!sortBy" v-model="sortDesc" slot="append">
                            <option :value="false">Asc</option>
                            <option :value="true">Desc</option>
                        </b-form-select>
                    </b-input-group>
                </b-form-group>
            </b-col>
            <b-col md="6" class="my-1">
                <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0" />
            </b-col>
            <b-col md="6" class="my-1">
                <b-form-group horizontal label="Per page" class="mb-0">
                    <b-form-select :options="pageOptions" v-model="perPage" />
                </b-form-group>
            </b-col>
        </b-row>

        <!-- Main table element -->
        <b-table show-empty
                 stacked="md"
                 :items="items"
                 :fields="fields"
                 :current-page="currentPage"
                 :per-page="perPage"
                 :filter="filter"
                 :sort-by.sync="sortBy"
                 :sort-desc.sync="sortDesc"
                 @filtered="onFiltered"
        >
            <template slot="image_url" slot-scope="row" ><img class="profile-image" :src="row.value" alt=""></template>
            <template slot="name" slot-scope="row">{{row.value}}</template>
            <template slot="address" slot-scope="row">{{row.value}}</template>
            <template slot="contact" slot-scope="row">{{row.value}}</template>
            <template slot="email_address" slot-scope="row">{{row.value}}</template>
            <template slot="website" slot-scope="row">{{row.value}}</template>
            <template slot="actions" slot-scope="row">
                <!-- We use @click.stop here to prevent a 'row-clicked' event from also happening -->
                <b-button size="sm" @click.stop="info(row.item, row.index, $event.target)" class="mr-1">
                    <i class="fa fa-info"></i> View
                </b-button>
                <b-button size="sm" @click.stop="deleteEntry(row.item, row.index)" class="mr-1 btn btn-danger">
                    <i class="fa fa-remove"></i> Delete
                </b-button>
                <router-link :to="{name: 'editCompany', params: {id: row.item}}" class="mr-1 btn btn-default">
                    <i class="fa fa-edit"></i>Edit
                </router-link>
                <b-button size="sm" @click.stop="row.toggleDetails">
                    {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
                </b-button>
            </template>
            <template slot="row-details" slot-scope="row">
                <b-card>
                    <ul>
                        <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value}}</li>
                    </ul>
                </b-card>
            </template>
        </b-table>

        <!-- Info modal -->
        <b-modal id="modalInfo" @hide="resetModal" :title="modalInfo.title" ok-only>
            <pre>{{ modalInfo.content }}</pre>
        </b-modal>

    </b-container>
</template>

<script>
    const items = [
    ]

    export default {
        data () {
            return {
                items: items,
                fields: [
                    { key: 'image_url', label: 'Image' },
                    { key: 'name', label: 'Company name', sortable: true },
                    { key: 'address', label: 'Address', sortable: true },
                    { key: 'contact', label: 'Contact'},
                    { key: 'email_address', label: 'Email'},
                    { key: 'website', label: 'Website'},
                    { key: 'actions', label: 'Actions' }
                ],
                currentPage: 1,
                perPage: 5,
                totalRows: items.length,
                pageOptions: [ 5, 10, 15 ],
                sortBy: null,
                sortDesc: false,
                filter: null,
                modalInfo: { title: '', content: '' }
            }
        },
        mounted() {
            let app = this;
            axios.get('/api/v1/companies')
                .then(function (resp) {
                    app.items = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load companies");
                });
        },
        computed: {
            sortOptions () {
                // Create an options list from our fields
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => { return { text: f.label, value: f.key } })
            }
        },
        methods: {
            info (item, index, button) {
                this.modalInfo.title = `Row index: ${index}`
                this.modalInfo.content = JSON.stringify(item, null, 2)
                this.$root.$emit('bv::show::modal', 'modalInfo', button)
            },
            resetModal () {
                this.modalInfo.title = ''
                this.modalInfo.content = ''
            },
            onFiltered (filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    let app = this;
                    axios.delete('/api/v1/companies/' + id)
                        .then(function (resp) {
                            app.companies.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete company");
                        });
                }
            }
        }
    }
</script>
