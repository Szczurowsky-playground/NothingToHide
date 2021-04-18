<script id="check">
    async function sendData(){
        if ('storage' in navigator && 'estimate' in navigator.storage) {
            const {usage, quota} = await navigator.storage.estimate();

            if(quota < 1200000000){
                console.log('Incognito');
                var tz = jstz.determine();
                var timezone = tz.name();
                document.getElementById('Timezone').value = timezone;
                document.getElementById('Incognito').value = 1;
                var formData = $("#Data").val();
                $.ajax({
                    type: 'post',
                    data: {'incognito' : formData},
                    success: function( data ) {
                        console.log(data);
                    }
                });
                document.getElementById("Data").submit();
            } else {
                console.log('Not Incognito');
                var tz = jstz.determine();
                var timezone = tz.name();
                document.getElementById('Timezone').value = timezone;
                document.getElementById('Incognito').value = 0;
                var formData = $("#Data").val();
                $.ajax({
                    type: 'post',
                    data: {'incognito' : formData},
                    success: function( data ) {
                        console.log(data);
                    }
                });
                document.getElementById("Data").submit();
            }
        } else {
            console.log('Error');
        }
    }
    <?php if(!isset($_POST['Incognito']) || !isset($_POST['Timezone'])){echo "sendData();";}
    if(isset($_POST['Incognito']) || isset($_POST['Timezone'])){echo 'document.getElementById("check1").remove();document.getElementById("Data").remove();';}?>
</script>