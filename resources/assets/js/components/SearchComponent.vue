<template>
    <div class="right-section main-section">
        <div class="story-section">

            <div class="single-story">
                <div class="story-category">
                    <h1>Search here</h1>
                </div>
                <div class="search-field">
                    <input type="text" class="search"/>
                    <button type="button">Search</button>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchComponent"
    }
</script>

<style scoped>
    .search-field input{
        width: 50%;
        padding: 15px;
        border-radius: 15px;
        -webkit-box-shadow: -2px -3px 15px 4px rgba(85, 136, 6, 0.6);
        -moz-box-shadow: -2px -3px 15px 4px rgba(136, 136, 136, 0.6);
        box-shadow: -2px -3px 15px 4px rgba(136, 136, 136, 0.6);
    }
</style>