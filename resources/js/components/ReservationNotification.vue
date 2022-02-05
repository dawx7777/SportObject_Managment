<template>
    
  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{reservations.length}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header"></span>
          <div class="dropdown-divider"></div>
        
          <a href="#" class="dropdown-item" v-bind:key="reservation" v-for='reservation in reservations'>
            <i class="fas fa-envelope mr-2"></i> 
        {{reservation.data}}
          </a>
          
          <a href="#" class="dropdown-item" v-if="reservations.length==0">
            <i class="fas fa-envelope mr-2"></i> Brak powiadomień
            
          </a>
         
         
        
        </div>
      </li>

    
</template>
<script>
export default{
    props: ['reservations'],
}
</script>
