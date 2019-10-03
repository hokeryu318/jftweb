<template>
    <h2>{{ this.display_table_name }}</h2>
</template>

<script>
    export default {
        props: ['table_name'],
        data: function(){
            return {
                display_table_name: ''
            }
        },
        mounted() {
            this.display_table_name = this.table_name;
        },
        created() {
            this.get_change_table();
        },
        methods: {
            get_change_table() {
                Echo.channel('table-move-channel')//public channel
                .listen('TableMoveEvent', (event) => {
                    this.display_table_name = event.display_table_name;
                    console.dir(this.display_table_name);
                });
            },
        }
    };
</script>

