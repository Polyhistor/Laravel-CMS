   <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
           <i class="fas fa-fw fa-cog"></i>
           <span>Users</span>
       </a>
       <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">Users</h6>
               <a class="collapse-item" href="">Create a User</a>
               <a class="collapse-item" href="{{ route('users.index') }}">View All Users</a>
           </div>
       </div>
   </li>
