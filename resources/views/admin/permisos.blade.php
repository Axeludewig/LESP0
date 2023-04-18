<x-layout>
    <select id="all-users" name="all-users">
  @foreach ($users as $user)
    <option value="{{ $user->id }}">{{ $user->nombre }}</option>
  @endforeach
</select>

<br>

<select id="selected-users" name="selected-users[]" multiple>
  <!-- This list will be populated with selected users via JavaScript -->
</select>

<br>

<button type="button" onclick="moveSelectedUser()">Add</button>

<br>

<select id="all-evals" name="all-evals">
  @foreach ($evals as $eval)
    <option value="{{ $eval->id }}">{{ $eval->nombre }}</option>
  @endforeach
</select>

<script>
  function moveSelectedUser() {
    const allUsersSelect = document.getElementById('all-users');
    const selectedUsersSelect = document.getElementById('selected-users');

    for (const option of allUsersSelect.options) {
      if (option.selected) {
        selectedUsersSelect.add(option.cloneNode(true));
      }
    }

    for (let i = allUsersSelect.options.length - 1; i >= 0; i--) {
      if (allUsersSelect.options[i].selected) {
        allUsersSelect.remove(i);
      }
    }
  }
</script>
</x-layout>