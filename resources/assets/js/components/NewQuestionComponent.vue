<template>
    <div class="right-section main-section">
        <div class="story-section">

            <div class="single-story">
                <div class="story-category">
                    <h1>Question title</h1>
                </div>
                <div class="story-content">
                    <div class="question-title">
                        <input type="text" value="" placeholder="Question title">
                    </div>
                    <div class="question-content">
                        <textarea rows="4" cols="150" class="question-body" placeholder="Question"></textarea>
                    </div>

                    <button class="submit-question" :click="submitQuestion">Submit</button>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "NewQuestionComponent",
    }
</script>

<style scoped>

</style>