function delete_confirm(name, url)
{
  $('#delete_name').text(name);
  $('#delete_form').attr('action', url);
  $('#delete_confirm').show();
}

function collaborator_add()
{
  $('#add_collaborator').show();
}