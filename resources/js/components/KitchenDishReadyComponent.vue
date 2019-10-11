<template>

</template>

<script>
    export default {
        
        data: function(){
            return {
                
            }
        },
        mounted() {

        },
        created() {
            Echo.channel('kitchen-dish-ready-channel')//public channel
            .listen('KitchenDishReadyEvent', (event) => {
                window.location.replace('../../kitchen/main_screen?group_id=' + event.group_id);
            });
        },
    };
</script>
