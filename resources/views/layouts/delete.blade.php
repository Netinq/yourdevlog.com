<div id="delete_confirm" class="delete-confirm">
  <div class="delete-box col-10 offset-1 col-sm-6 offset-sm-3">
    <h3>Are you sure you want to delete</h3>
    <h4 id="delete_name">DELETE_NAME</h4>
    <div class="delete-choose">
      <div class="btn cancel" onclick=" $('#delete_confirm').hide();">cancel</div> 
      <a href="#" onclick="event.preventDefault();document.getElementById('delete_form').submit();" ><div class="btn delete">delete</div></a>
      <form id="delete_form" action="ACTION" method="POST">
        @csrf
        @method('DELETE')
      </form>
    </div>
  </div>
</div>