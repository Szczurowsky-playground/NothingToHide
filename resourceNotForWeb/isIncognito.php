<script>
    async function isIncognito(){
    if ('storage' in navigator && 'estimate' in navigator.storage) {
    const {usage, quota} = await navigator.storage.estimate();

    if(quota < 1200000000){
    console.log('Incognito');
    var formData = $("#Incognito1").val();
    $.ajax({
    type: 'post',
    data: {'incognito' : formData},
    success: function( data ) {
    console.log(data);
}
});
    document.getElementById("Incognito1").submit();
} else {
    console.log('Not Incognito');
    var formData = $("#NotIncognito1").val();
    $.ajax({
    type: 'post',
    data: {'incognito' : formData},
    success: function( data ) {
    console.log(data);
}
});
    document.getElementById("NotIncognito1").submit();
}
} else {
    console.log('Error');
}
}
    <?php if(!isset($_POST['Incognito'])){echo "isIncognito();";}?>
</script>