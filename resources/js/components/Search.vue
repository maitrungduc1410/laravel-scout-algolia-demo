<template>
	<div class="container">
		<div class="search">
			<div class="search-container">
				<div class="content-header">
					<h2 class="title is-2 text-title">Laravel Scout with Algolia Search Engine</h2>
				</div>
				<br>
				<div class="text-description">
					<code>- Enter anything to search. Search result will be processed and returned by Algolia</code>
					<br>
					<code>- <i>Sorry for the name and email, they're look not pretty because I can't use Faker on Heroku</i></code>
					<br>
					<code>- <i>This demo built with Laravel and VueJS</i></code>

				</div>
				<div class="input-search">
					<b-field>
			            <b-input placeholder="Search..."
			                type="search"
			                icon="magnify"
			                v-model="txt_search"
			                @keyup.native.enter="getUsers">
			            </b-input>
			        </b-field>
				</div>
				<div class="table-user">
					<b-table
			            :data="list_users"
			            :loading="loading"
			            paginated
			            backend-pagination
			            :total="pagination.total"
			            :per-page="pagination.per_page"
				        @page-change="onPageChange">

			            <template slot-scope="props">
			                <b-table-column field="id" label="ID" sortable>
			                    {{ props.row.id }}
			                </b-table-column>

			                <b-table-column field="name" label="Name">
		                        {{ props.row.name }}
			                </b-table-column>

			                <b-table-column field="email" label="Email">
			                     {{ props.row.email }}
			                </b-table-column>

			                <b-table-column field="created_at" label="Created At">
			                    {{ props.row.created_at }}
			                </b-table-column>
			            </template>
			        </b-table>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				loading: false,
				list_users: [],
				pagination: {
                    current_page: 1,
                    per_page: 10,
                    last_page: 1,
                    total: 1
			    },
			    txt_search: ''
			}
		},
		created() {
			this.getUsers()
		},
		methods: {
			getUsers(page = 1) {
				this.loading = true
				axios.get('/getUsers?page=' + page, {params: {search: this.txt_search}})
				.then(response => {
					this.list_users = response.data.data
                    this.pagination.current_page = response.data.current_page
                    this.pagination.per_page = response.data.per_page
                    this.pagination.last_page = response.data.last_page
                    this.pagination.total = response.data.total
                    this.loading = false
				})
				.catch(error => {
					console.log(error)
					this.loading = false
				})
			},
			onPageChange(page) {
				this.getUsers(page)
			}
		}
	}
</script>

<style lang="scss" scoped>
.search {
	.search-container {
	    padding-top: 30px;
	    .content-header {
	    	.text-title {
	    		font-weight: 300;
				text-align: center;
	    	}
	    }
	    .input-search {
	    	margin-top: 30px;
	    }
	    .table-user {
	    	margin-top: 30px;
	    }
	}
}
</style>