<template>
    <div>
        <div class="topnav">
            <router-link to="/dashboard">Search by city</router-link>
            <router-link to="/search">Cities by search</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "siteHeader",
}
</script>

<style scoped>
body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}

.topnav {
    overflow: hidden;
    background-color: #333;
}

.topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover {
    background-color: #ddd;
    color: black;
}

.topnav a.active {
    background-color: #04AA6D;
    color: white;
}
</style>
