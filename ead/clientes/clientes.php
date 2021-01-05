<style>
    .acao{
        width:23px !important;
    }
    th{
        font-weight:bold !important;
        font-size:15px !important;
    }
</style>
<link rel='stylesheet' href='https://unpkg.com/bootstrap-vue@2.0.4/dist/bootstrap-vue.min.css'>
<script src='https://unpkg.com/bootstrap-vue@2.0.4/dist/bootstrap-vue.min.js'></script>
<div id="apps">

  <b-container fluid class="p-3">
    <div>
      <b-form-row align-v="center">
        <b-col>
          <h2>Total de Alunos: {{ filteredLength }}</h2>
        </b-col>
        <b-col cols="1">
          <b-form-group label="Mostrar" label-cols="5" label-align-sm="right" label-for="perPageSelect" class="mb-0">
            <b-form-select id="perPageSelect" v-model.number="perPage">
            <option v-for="i in 5" :value="i * 5">{{ i * 5 }}</option>
              <option v-for="i in 12" :value="i * 25">{{ i * 25 }}</option>
            </b-form-select>
          </b-form-group>
        </b-col>
        <b-col cols="3">
          <b-form-group label="Filtrar" label-cols="2" label-align="right" label-for="filterInput">
            <b-form-input type="search" id="filterInput" placeholder="Procurar" v-model="filter"></b-form-input>
          </b-form-group>
        </b-col>

      </b-form-row>
      <b-table class="table b-table table-striped"
               table-variant="light"
               :items="comments" 
               :fields="fields" 
               :filter="filter" 
               :sort-by.sync="sortBy" 
               :sort-desc.sync="sortDesc" 
               :current-page="currentPage"
               :per-page="perPage" 
               filter-debounce="200"
               no-border-collapse
               @filtered="filtered"
       >
    <template v-slot:cell(Editar)="row">
        <a  :href='"?routeUsua="+row.item.id'><i class="text-primary icon icon-pencil" ></i></a>
     </template>
     <template v-slot:cell(Deletar)="row">
        <a href="#!" :data-id="row.item.id"  onclick="DeletarItem(getAttribute('data-id'), 'DeletarUsua');"><i class="text-danger icon icon-remove" ></i></a>
     </template>
         <template v-slot:cell(Mais)="row" >
        <b-button size="sm" @click="row.toggleDetails" class="mr-2">
          {{ row.detailsShowing ? '-' : '+'}}
        </b-button>
      </template>
    <template v-slot:row-details="row">
        <b-card>
          <b-row class="mb-2">
            <b-col sm="3" class="text-sm-right"><b>Data de Nascimento:</b></b-col>
            <b-col>{{ row.item.data }}</b-col>
          </b-row>
          <b-row class="mb-2">
            <b-col sm="3" class="text-sm-right"><b>CPF:</b></b-col>
            <b-col>{{ row.item.cpf }}</b-col>
          </b-row>
        </b-card>
    </template>
      </b-table>
      <b-col cols="8" class="mx-auto mt-4">
        <b-pagination
            v-model="currentPage"
            :total-rows="filteredLength"
            :per-page="perPage"
            limit="9"
            align="center"
            class="my-0"
        ></b-pagination>
      </b-col>
    </div>
  </b-container>
</div>

<script>
new Vue({
  el: "#apps",
  data: {
    perPage: 25,
    filter: null,
    currentPage: 1,
    sortBy: "id",
    sortDesc: false,
    filteredLength: null,
    fields: [
      {key: "Mais",class: "acao" },
      { key: "id", label: "ID", class: "acao", sortable: true },
      { key: "nome", sortable: true },
      { key: "endereco", lable:"Endereço", sortable: true },
      { key: "Editar", sortable: false, class: "acao" },
      { key: "Deletar", sortable: false, class: "acao" }
    ],
    comments: []
  },
  computed:{
    totalRows(){
      return this.comments.length;
    }
  },
  methods:{
    filtered(arr, num){
      console.log('array', arr);
      console.log('number', num);
      this.filteredLength = num;
    }
  },
  mounted() {
    const request = async () => {
      const res = await fetch("<?php echo ConfigPainel('base_url'); ?>ead/clientes/database.php");
      const comments = await res.json();
      return comments;
    };
   request().then(data => {
     this.comments = data;
     this.filteredLength = data.length;
   })
  }
});
</script>


