/* MI APP.JS  */


new Vue ({
   el: '#crud' ,

   created: function(){
       this.getKeeps();
   },

   data: {
        keeps: [],
        newKeep: '',
        errors: [],
        fillKeep: {'id':'', 'keep':''},
        pagination : {
              'total'        : 0,
              'current_page' : 0,
              'per_page'     : 0,
              'last_page'    : 0,
              'from'         : 0,
              'to'           : 0

        },
        offset : 3
   },

   computed: {
        isActived: function () {
            return this.pagination.current_page;
        },

        pagesNumber: function () {
            if ( !this.pagination.to ) {
              return [];
            }
            var from = this.pagination.current_page - this.offset;
            if ( from < 1) {
              from = 1;
            }

            var to = from + ( this.offset * 2 ); // to do offset
            if ( to >= this.pagination.last_page ) {
                to = this.pagination.last_page;
            }

            var pageArray = [];
            while ( from <= to ){
              pageArray.push( from );
              from++;
            }
            return pageArray;

        }

   },

   methods: {

           /*getKeeps: function () {
              var urlKeeps = 'tasks';
               axios.get(urlKeeps ).then( response => {

                  //this.keeps = response.data ;

                  // Como incluí paginanacion la forma de acceder a los datos cambia un poco
                  this.keeps      = response.data.tasks.data,
                  this.pagination = response.data.pagination
               });
           },
           */
           // Hice cambio en este metodo para pasar un avariable por get. ver var = url
           getKeeps: function ( page ) {
              var urlKeeps = 'tasks?page='+page;

               axios.get(urlKeeps ).then( response => {

                  //this.keeps = response.data ;

                  // Como incluí paginanacion la forma de acceder a los datos cambia un poco
                  this.keeps      = response.data.tasks.data,
                  this.pagination = response.data.pagination
               });
           },

           editKeep: function( keep ){
              this.fillKeep.id = keep.id;
              this.fillKeep.keep = keep.keep;
              $('#edit').modal('show');

           },

           updateKeep: function (id){
              var url ='tasks/'+id;
              axios.put( url, this.fillKeep).then( response=>{
                  this.getKeeps();
                  this.fillKeep = {'id':'', 'keep':''};
                  this.errors = [];
                  $('#edit').modal('hide');
                  toastr.success('Actualizado correctamente');
                }).catch(error => {
                  this.errors = error.response.data.errors.keep
              });
           },

           deletekeep: function(keep){
              var url = 'tasks/'+ keep.id;
              axios.delete(url).then(response => {
                this.getKeeps();
                toastr.success('Eliminado correctamente');
              });
           },

           createKeep: function(){
              var url ='tasks';
              axios.post( url, {
                keep: this.newKeep
              }).then ( response => {
                this.getKeeps();
                this.newKeep ='';
                this.errors  =[];
                $('#create').modal('hide');
                toastr.success('Creado correctamente');
              }).catch(error => {
                this.errors = error.response.data.errors.keep

                //error.response.data
                //alert( error.response.data.errors.keep[0]);

              });
           },

           changePage: function ( page ) {

              this.pagination.current_page = page ;
              this.getKeeps( page );
           }



   }
});
