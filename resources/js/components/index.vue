<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group">
                    <li v-for="user in values.usersName">
                        {{ user["first-name"] + ' ' + user["last-name"] }}
                        <!-- {{ user }} -->
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            values: {
                usersName: [],
            }
        }
    },

    beforeMount:function(){
        this.getUsersTimerActive();
    },

    methods: {
        getUsersTimerActive: async function() {
            let users = await this.returnUsersTimerActive();
            this.values.usersName = users;
        },

        returnUsersTimerActive: async function() {
            let result = await this.$http.get('user');
            let infoUsers = JSON.parse(result.bodyText);
            return infoUsers;
        }
    }
}
</script>
