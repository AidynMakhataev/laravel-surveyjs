<template>
    <v-app>
        <v-card flat>
            <v-toolbar dark color="primary" flat extended>
                <v-toolbar-title>Survey Manager</v-toolbar-title>
            </v-toolbar>
            <v-layout row pb-2>
                <v-flex xs8 offset-xs2>
                    <v-card class="card--flex-toolbar">
                        <v-card-text>
                            <router-view></router-view>
                            <v-snackbar
                                    :timeout="6000"
                                    bottom
                                    right
                                    multi-line
                                    v-model="$root.snackbar"
                            >
                                {{ $root.snackbarMsg }}
                                <v-btn flat color="blue" @click.native="$root.snackbar = false">Close</v-btn>
                            </v-snackbar>
                        </v-card-text>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-card>
    </v-app>
</template>

<style>
    .card--flex-toolbar {
        margin-top: -64px;
    }
    .github-corner:hover .octo-arm  {
        animation:octocat-wave 560ms ease-in-out
    }
    @keyframes octocat-wave {
        0%,100% {
            transform:rotate(0)
        }
        20%,60% {
            transform:rotate(-25deg)
        }
        40%,80% {
            transform:rotate(10deg)
        }
    }
    @media (max-width:500px)    {
        .github-corner:hover .octo-arm  {
            animation:none
        }
        .github-corner .octo-arm    {
            animation:octocat-wave 560ms ease-in-out
        }
    }
</style>