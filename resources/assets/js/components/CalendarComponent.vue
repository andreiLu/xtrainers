<template>
    <div class="week-days">
        <div class="single-day" v-for="singleDay in weekDays">
            <p class="week-day"> {{singleDay.day}} </p>
            <p class="week-date"> {{singleDay.date}} </p>
        </div>

    </div>
</template>

<script>
    export default {
        name: "CalendarComponent",
        data: function() {
          return {
              weekDays: ''
          }
        },
        methods: {
            getCalendar: function () {
                let self = this;

                axios.get('get-calendar')
                    .then(function (response) {
                        self.weekDays = response.data;
                    })
                    .catch(function (error) {
                        resultElement.innerHTML = generateErrorHTMLOutput(error);
                    });
            }
        },
        mounted() {
            this.getCalendar();

        }
    }
</script>

<style scoped>

    .single-day{
        float: left;
        margin: 20px;
        font-weight: bold;
    }

    .week-day {
        font-size: 25px;
        color: red;
        text-align: center;
    }

    .week-date{
        font-size: 25px;
        color: white;
    }

</style>