
  <ul class="pagination">

    <li v-if="pagination.current_page > 1">
      <a href="#" v-on:click.prevent="changePage(pagination.current_page - 1)">
      Atrás
     </a>
    </li>

    <li v-for="page in pagesNumber" v-bind:class="[page == isActived ? 'active' : '']">
     <a href="#" @click.prevent="changePage( page )">
        @{{ page }}
     </a>
    </li>

     <li v-if="pagination.current_page < pagination.last_page">
      <a href="#" v-on:click.prevent="changePage(pagination.current_page + 1)">
       Siguiente
      </a>
     </li>

  </ul>
  </nav>

