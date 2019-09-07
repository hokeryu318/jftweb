<template>
    <div v-if="group_order_dishes.length > 0">
    <!--<table v-for="(group_order_dish, key) in group_order_dishes.slice().reverse()">-->
    <table v-for="(group_order_dish, key) in group_order_dishes">
        <!--<tr v-if="group_order_dish.ready_flag === 0">-->
        <tr>
            <td width="7%" align="center">
                <div :id="'time_' + key + '_' + group"></div>
            </td>
            <!--<td width="13%" style="padding-left: 2px;padding-right: 2px;" v-on:click="extract_table_number(group_order_dish.display_table_id)">-->
            <td width="13%" style="padding-left: 2px;padding-right: 2px;" class="table_list" :data-id = group_order_dish.display_table_id >
                <b>{{ group_order_dish.display_table }}</b><br>({{ group_order_dish.table_count }})
            </td>
            <td width="8%">
                <img v-if="group_order_dish.dish_image !== null" :src="'/dishes/' + group_order_dish.dish_image" class="general">
            </td>
            <td width="56%" class="dish_list" :data-id=group_order_dish.dish_id>
                <b>{{ group_order_dish.dish_name_en }}</b>
                <br>
                <div v-for="option in group_order_dish.options">
                {{ option.option_name }}: <b>{{ option.item_name }}</b>&nbsp;
                </div>
            </td>
            <td width="8%">
                <span class="multiple">&times;</span>&nbsp;
                <span class="qty">{{ group_order_dish.count }}</span>
            </td>
            <td width="8%">
                <label class="checkbox_container">
                    <input v-if="group_order_dish.ready_flag === 1" type="checkbox" checked="checked" >
                    <input v-else type="checkbox" >
                    <span class="checkboxmark" v-on:click="ready(group_order_dish.id, key)"></span>
                </label>
            </td>
        </tr>
    </table>

    </div>
</template>

<script>
    export default {
        props: ['group'],
        data: function(){
            return {
                group_order_dishes: [],
            }
        },
        mounted() {
            // console.dir(this.ger_dishes(this.group);
        },
        created() {
            Echo.channel('kitchen-channel')//public channel
            .listen('KitchenEvent', (event) => {

                console.log(this.group + "=>" + event.added_dish.group_id);
                var g_id = event.added_dish.group_id;
                // var g_id_arr = g_id.split(",");
                // console.dir(g_id_arr);
                // console.dir(('['+ g_id + ']').includes(this.group));

                // if(this.group === event.added_dish.group_id) {
                if(('[' + event.added_dish.group_id + ']').includes('&' + this.group + '&') == true) {
                    this.group_order_dishes.push({

                        display_table: event.added_dish.display_table,
                        table_count: event.added_dish.table_count,
                        dish_image: event.added_dish.dish_image,
                        dish_name_en: event.added_dish.dish_name_en,
                        options: event.added_dish.options,
                        count: event.added_dish.count,
                        ready_flag: event.added_dish.ready_flag,
                        starting_time: event.added_dish.starting_time,
                        calling_time: event.added_dish.calling_time,
                        dish_id: event.added_dish.dish_id,
                        dish_price: event.added_dish.dish_price,
                        display_table_id: event.added_dish.display_table_id,
                        group_id: event.added_dish.group_id,
                        id: event.added_dish.id,
                        order_id: event.added_dish.order_id,
                        total_price: event.added_dish.total_price
                    });
                    // this.group_order_dishes.reverse();//display array reverse

                    location.href = window.location.href;
                }
                // this.group_order_dishes.pop();//array record remove
            });

            // display part for dish list by group change
            this.get_by_group_order_dishes(this.group);

            Echo.channel('changecount-channel')//public channel
            .listen('ChangeCountEvent', (event) => {

                    // console.dir(event.group_id);
                if(('[' + event.group_id + ']').includes('&' + this.group + '&') == true) {

                    location.href = window.location.href;
                }
            });

        },
        methods: {
            // api for get dish list by change group
            get_by_group_order_dishes(group_id) {
                // console.log(group_id);
                axios.get('/api/get_change_group_dish/' + group_id)
                    .then(response => {
                        this.group_order_dishes = response.data;
                        // console.dir(this.group_order_dishes);
                    })

            },
            //ready flag check part
            ready(id, key) {
                // this.group_order_dishes.splice(key, 1);
                // this.group_order_dishes.pop(6-key);
                var selected_id = id;
                axios.post('/api/ready', {selected_id: selected_id})
                    .then(response => {
                        console.dir(response.data);
                    })
            },

        }
    };
</script>
