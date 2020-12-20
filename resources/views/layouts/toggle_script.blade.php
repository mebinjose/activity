<script>
    var oldId;
    function toggleEdit(id){
        if(oldId){
            document.getElementById('view_'+oldId).style.display = 'block';
            document.getElementById('edit_'+oldId).style.display = 'none';    
        }
        document.getElementById('view_'+id).style.display = 'none';
        document.getElementById('edit_'+id).style.display = 'block';
        oldId = id
    }

    function closeEdit(id){
        document.getElementById('view_'+id).style.display = 'block';
        document.getElementById('edit_'+id).style.display = 'none';
    }
</script>