<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Website Builder</title>
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");

        * {
            box-sizing: border-box;
            outline: none;
        }


        /* Customize the scrollbar */
        ::-webkit-scrollbar {
            width: 7px !important;
            background-color: #3a3a3a00;
            float: left;
            overflow-y: scroll;
            margin-bottom: 25px;

        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: #282828;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #6934b7 !important;
            margin-top:-10px; 
            margin-bottom: -10px;
        }



        body,
        html {
            font-family: "Roboto", sans-serif;
            --large-font-size: 16px;
            --medium-font-size: 13px;
            --small-font-size: 12px;
        }

        html {
            --primary-color: #161724;
            --secondary-color: #F6F6FA;
            --tab-primary-color: #212337;
            --tab-secondary-color: #FFFFFF;
            --primary-font-color: #8D8EA1;
            --secondary-font-color: #4D4F60;
            --primary-tab-selected-font: #FFFFFF;
            --secondary-tab-selected-font: #4D4F60;
            --primary-tool-background: #212337;
            --secondary-tool-background: #FFFFFF;
            --icon-primary-color: #E1E2EA;
            --icon-secondary-color: #4D4F60;
            --primary-button-color: #E1E2EA;
            --secondary-button-color: #4D4F60;
            --content-primary-color: #FFFFFF;
            --content-secondary-color: #212337;
            --collapsible-primary-color: #2F3147;
            --collapsible-secondary-color: #EBEBF5;
            --collapsible-primary-background: #212337;
            --collapsible-secondary-background: linear-gradient(to top, #FFFFFF, #F1F1F7);
            --collapsible-primary-focus-color: #494B66;
            --collapsible-secondary-focus-color: #1ABDFF;
            --primary-content-background: #161724;
            --secondary-content-background: linear-gradient(to top, #FFFFFF, #F1F1F7);
            --primary-visual-area-bg: #212337;
            --secondary-visual-area-bg: #FFFFFF;
            --figma-primary-logo-color: #33354A;
            --figma-secondary-logo-color: #E7E7E7;
            --primary-dark-tool-color: #8D8EA1;
            --secondary-dark-tool-color: #4D4F60;
            --primary-light-tool-color: #8D8EA1;
            --secondary-light-tool-color: #4D4F60;
            --primary-border-color: rgba(255, 255, 255, 0.85);
            --secondary-border-color: rgba(38, 38, 38, 0.95);
        }

        html.switch {
            --secondary-color: #161724;
            --primary-color: #F6F6FA;
            --tab-primary-color: #FFFFFF;
            --tab-secondary-color: #161724;
            --primary-font-color: #4D4F60;
            --secondary-font-color: #8D8EA1;
            --primary-tab-selected-font: #4D4F60;
            --secondary-tab-selected-font: #FFFFFF;
            --primary-tool-background: #FFFFFF;
            --secondary-tool-background: #212337;
            --icon-primary-color: #4D4F60;
            --icon-secondary-color: #E1E2EA;
            --primary-button-color: #4D4F60;
            --secondary-button-color: #E1E2EA;
            --content-primary-color: #212337;
            --content-secondary-color: #FFFFFF;
            --collapsible-primary-color: #EBEBF5;
            --collapsible-secondary-color: #2F3147;
            --collapsible-primary-background: linear-gradient(to top, #FFFFFF, #F1F1F7);
            --collapsible-secondary-background: #212337;
            --collapsible-primary-focus-color: #1ABDFF;
            --collapsible-secondary-focus-color: #494B66;
            --primary-content-background: linear-gradient(to top, #FFFFFF, #F1F1F7);
            --secondary-content-background: #161724;
            --primary-visual-area-bg: #FFFFFF;
            --secondary-visual-area-bg: #212337;
            --figma-primary-logo-color: #EFEFEF;
            --figma-secondary-logo-color: #33354A;
            --primary-dark-tool-color: #4D4F60;
            --secondary-dark-tool-color: #8D8EA1;
            --primary-light-tool-color: #4D4F60;
            --secondary-light-tool-color: #E1E2EA;
            --primary-border-color: rgba(38, 38, 38, 0.95);
            --secondary-border-color: rgba(255, 255, 255, 0.85);
        }

        .figma-app {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .tab-bar {
            height: 38px;
        }

        .tab-bar .container {
            padding: 2px 8px 2px 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;

        }

        .left {
            display: flex;
            align-items: center;
        }

        .icon {
            line-height: 0;
            margin-top: 4px;
        }

        .circle {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .circles-wrapper {
            display: flex;
            justify-content: space-between;
            width: 40px;
        }

        .circle-red {
            background-color: #fc615d;
        }

        .circle-yellow {
            background-color: #fdbd41;
        }

        .circle-green {
            background-color: #35ca4a;
        }

        .nav-input {
            display: none;
        }

        .sections label {
            font-size: var(--medium-font-size);
            font-weight: 500;
            color: var(--primary-font-color);
            padding-right: 22px;
            padding-left: 10px;
            display: inline-flex;
            align-items: center;
            height: 36px;
            clip-path: polygon(0 0, 80% 0%, 93% 100%, 0% 100%);
            border-radius: 4px 0 4px 0;
        }

        .sections {
            display: flex;
            align-items: center;
            align-self: flex-end;
        }

        #website-builder-app:checked~.sections label[for="website-builder-app"],
        #components:checked~.sections label[for="components"],
        #add:checked~.sections label[for="add"] {
            background: var(--tab-primary-color);
            color: var(--primary-tab-selected-font);
        }

        .right {
            display: flex;
            align-items: center;
        }

        .switch-theme {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 24px;
            margin-left: 10px;
        }

        .switch-theme input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            border-radius: 40px;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .3s;
            transition: .3s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            border-radius: 50%;
            background-color: white;
            -webkit-transition: .3s;
            transition: .3s;
        }

        input:checked+.slider {
            background: linear-gradient(to right, #203a43, #2c5364);
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(16px);
            -ms-transform: translateX(16px);
            transform: translateX(16px);
        }

        .container {
            background: var(--primary-color);
            color: var(--secondary-color);
        }

        .right p {
            font-size: var(--medium-font-size);
            font-weight: 500;
        }

        .tool-bar {
            height: 44px;
            background-color: var(--primary-tool-background);
        }

        .icon-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            width: 44px;
            background: none;
            border: none;
            color: var(--icon-primary-color);
        }

        .tool-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .line {
            margin-right: 6px;
        }

        .right {
            display: flex;
            align-items: center;
        }

        .icon-button {
            color: var(--primary-button-color);
        }

        .zoom-input {
            display: flex;
            align-items: center;
        }

        .zoom-input input {
            background: none;
            border: none;
            width: 50px;
        }

        .line.right {
            margin-left: 10px;
        }

        .menu {
            position: relative;
            display: inline-block;
        }

        button:hover {
            opacity: .5;
        }

        .menu nav {
            position: absolute;
            top: 134%;
            left: 4px;
            width: 200px;
            display: flex;
            flex-direction: column;
            padding: 10px;
            background-color: var(--primary-color);
            border-radius: 4px;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: .4s;
        }

        nav.is-opened {
            opacity: 1;
            visibility: visible;
            pointer-events: all;
        }

        .menu a {
            text-decoration: none;
            color: var(--primary-tab-selected-font);
            font-size: var(--medium-font-size);
            padding-left: 10px;
            padding-top: 10px;
        }

        nav.is-opened a {
            animation-name: test;
            animation-delay: .2s;
            animation-duration: .6s;
            animation-fill-mode: both;
        }

        @keyframes test {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        hr {
            width: 100%;
            border: .4px solid #ECECEC;
            opacity: .4;
            margin: 10px 0 0 0;
        }

        ::placeholder {
            font-size: var(--small-font-size);
            color: var(--primary-tab-selected-font);
        }

        .input-field {
            display: flex;
            justify-content: space-between;
            border-radius: 8px;
            border: 1.4px solid #1ABDFF;
            padding: 4px 4px 4px 4px;
        }

        .input-field input {
            background: none;
            border: none;
        }

        input[type="text"] {
            font-size: var(--small-font-size);
            color: var(--primary-font-color);
        }

        .app-content {
            display: flex;
            flex: 1;
        }

        .side-bar {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            background-color: var(--tab-primary-color);
            width: 240px;
            font-weight: 500;
        }

        .side-bar-nav {
            flex-direction: row;
        }

        .side-bar-nav a {
            display: block;
            width: 100%;
            font-size: var(--medium-font-size);
            font-weight: 500;
            letter-spacing: 1px;
            text-decoration: none;
            color: var(--content-primary-color);
            padding-left: 10px;
            padding-top: 10px;
        }

        .arrow {
            margin-right: 5px;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
            margin: 0;
        }

        .collapsible-content * svg {
            margin-right: 4px;
        }

        .collapsible-accordion {
            color: var(--icon-primary-color);
            font-size: var(--medium-font-size);
        }

        .collapsible-sub-header {
            display: flex;
            align-items: center;
            padding-left: 16px;
            padding: 2px 0;
        }

        .collapsible-sub-header span {
            margin-right: 5px;
        }

        .collapsible-sub-content {
            padding-left: 36px;
        }

        .collapsible-sub-content li {
            display: flex;
            align-items: center;
        }

        .list-content-left,
        .list-content-right {
            display: flex;
            align-items: center;
        }

        .list-content-right {
            padding-right: 4px;
        }

        .content-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .font-color {
            color: #BB6BD9;
        }

        .collapsible-header {
            display: flex;
            align-items: center;
            background-color: var(--collapsible-primary-color);
        }

        .collapsible-header:focus {
            background: var(--collapsible-primary-focus-color);
        }

        .collapsible-accordion li {
            padding-top: 1px;
        }

        .inspector {
            width: 243px;
            background: var(--primary-tool-background);
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: var(--primary-content-background);
            flex: 1;
        }

        .content-area {
            background: var(--primary-visual-area-bg);
        }

        .content p {
            background: none;
            color: var(--primary-font-color);
            font-size: var(--small-font-size);
            font-weight: 500;
            left: 0;
        }

        span>svg {
            padding: 0;
        }

        .visual-area {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 70px;
        }

        .visual-area svg {
            max-width: 1000px;
            width: 100%;
            height: 100%;
            color: var(--figma-primary-logo-color);
        }

        .toggle-area {
            display: flex;
            align-items: center;
            font-size: var(--small-font-size);
            font-weight: 500;
            color: var(--primary-font-color);
            padding-left: 4px;
        }

        .inspector-sections label {
            font-size: var(--medium-font-size);
            font-weight: 500;
            color: var(--primary-font-color);
            padding: 10px 0;
        }

        .inspector-header {
            margin: 0;
            padding-bottom: 4px;
        }

        .wrapper {
            border-top: .01em solid var(--primary-border-color);
            padding: 10px;
        }

        .inspector-sections .wrapper {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 0 10px;
        }

        #design:checked~.inspector-sections label[for="design"],
        #prototype:checked~.inspector-sections label[for="prototype"],
        #code:checked~.inspector-sections label[for="code"],
        #right-arrow:checked~.inspector-sections label[for="right-arrow"] {
            color: var(--secondary-color);
            border-bottom: 2px solid var(--secondary-color);
        }

        .inspector-tools .wrapper {
            display: flex;
            justify-content: space-between;
        }

        .nav-inspector {
            display: none;
        }

        .wrapper button {
            background: none;
            border: none;
            padding: 0;
        }

        .wrapper button:hover {
            opacity: .5;
        }

        .dark-item {
            color: var(--primary-dark-tool-color);
        }

        .light-item {
            color: var(--primary-light-tool-color);
        }

        .input-wrapper input {
            background: none;
            border-radius: 4px;
            padding: 0 6px;
            height: 26px;
            width: 70px;
            border: .5px solid var(--primary-light-tool-color);
        }

        .input-wrapper p {
            color: var(--primary-font-color);
            font-weight: 500;
            font-size: var(--small-font-size);
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 86px;
            margin-right: 6px;
        }

        .inspector-inputs .left {
            display: flex;
            flex-wrap: wrap;
        }

        .inspector-inputs .wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .inspector-inputs {
            display: flex;
        }

        .constraints-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .first-constraint,
        .second-constraint {
            padding: 6px 0;
            display: flex;
            align-items: center;
        }

        .inspector-constraints .wrapper {
            justify-content: space-between;
        }

        .inspector-constraints p,
        .inspector-layer p,
        .header p {
            color: var(--secondary-color);
            font-weight: 500;
            font-size: var(--medium-font-size);
        }

        .export-text {
            font-weight: 500;
            font-size: var(--medium-font-size);
            color: var(--primary-dark-tool-color);
        }

        .layer-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .styled-select select {
            color: var(--secondary-color);
            padding: 6px 6px;
            border: none;
            box-shadow: none;
            background-color: transparent;
            background-image: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .styled-select {
            position: relative;
            border: 1px solid var(--primary-light-tool-color);
            border-radius: 4px;
            font-size: var(--small-font-size);
            width: 110px;
        }

        option {
            color: #161724;
        }

        .layer-wrapper input,
        .input-percent {
            background: none;
            border-radius: 4px;
            padding: 0 6px;
            height: 26px;
            width: 50px;
            border: 1px solid var(--primary-border-color);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .inspector,
        .side-bar {
            overflow: auto;
            height: calc(100vh - 82px);
            height: 100% !important;
        }

        .color-input-area {
            display: flex;
            align-items: center;
            border: 1.2px solid #3ED67E;
            background: #3ED67E 30%;
            width: 80px;
            height: 30px;
            border-radius: 4px;
        }

        .color-input-area input {
            padding-left: 2px;
            width: 56px;
            height: 26px;
            margin-left: auto;
            margin-right: 1px;
            border-radius: 0 3px 3px 0;
            border: none;
            background: var(--primary-tool-background);
        }

        .fill-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .inspector * svg:hover {
            opacity: .6;
        }

        .styled-select svg {
            position: absolute;
            top: 4px;
            right: 0;
            pointer-events: none;
            margin-left: auto;
        }
    </style>
</head>

<body style="padding: 0px; margin: 0px;">
    <div class="figma-app">
        <div class="tab-bar">
            <div class="container">
                <div class="left">
                    <input
                        class="nav-input"
                        name="nav"
                        type="radio"
                        id="figma-app"
                        checked />
                    <input class="nav-input" name="nav" type="radio" id="components" />
                    <input class="nav-input" name="nav" type="radio" id="add" />

                    <div class="icon" style="display: flex; align-items: center;">
                        <img style="max-width:2rem;" src="http://localhost/online-store.varsitymarket.package/control-panel/34cdc5ddd600874f7ac6a5b00361640a4e6bb31ab57ec28ef19ba759b07d6d7ddU1zYnhnMVNxOWpnNVNsWk9hYkt6Zk92YW02ai9ldmtpZFNGczFnd2VqcDBSejFkeWNrMmduUzlUdnAyMFU3SU5mdkpyY2I5MlBFY0RIenNVRW4wWmZ6OXdRNXJVUzBCcWd3SE5JVnhuN2s9/favicon.png">
                        <span style="font-size: 10px;">Website Builder</span>
                    </div>
                </div>
                <div class="right">
                    <div class="toggle-area">
                        <p>Dark Mode</p>
                        <label class="switch-theme">
                            <input type="checkbox" />
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="tool-bar">
            <div class="left">
                <div class="menu">
                    <button class="icon-button inline">
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line
                                x1="4"
                                y1="7"
                                x2="20"
                                y2="7"
                                stroke="currentcolor"
                                stroke-width="2" />
                            <line
                                x1="4"
                                y1="12"
                                x2="20"
                                y2="12"
                                stroke="currentcolor"
                                stroke-width="2" />
                            <line
                                x1="4"
                                y1="17"
                                x2="20"
                                y2="17"
                                stroke="currentcolor"
                                stroke-width="2" />
                        </svg>
                    </button>
                    <nav>
                        <div class="input-field">
                            <input type="text" placeholder="Search..."> </input>
                            <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="4" stroke="#8D8EA1" stroke-width="2" />
                                <line x1="10.2929" y1="10.7071" x2="8.29289" y2="8.70711" stroke="#8D8EA1" stroke-width="2" />
                            </svg>
                        </div>

                        <a href="#">File</a>
                        <a href="#">Edit</a>
                        <a href="#">View</a>
                        <a href="#">Object</a>
                        <a href="#">Vector</a>
                        <a href="#">Text</a>
                        <a href="#">Arrange</a>
                        <hr>
                        </hr>
                        <a href="#">Plugins</a>
                        <a href="#">Integrations</a>
                        <a href="#">Preferences</a>
                        <a href="#">Libraries</a>
                        <hr>
                        </hr>
                        <a href="#">Help and Account</a>
                    </nav>
                </div>
                <button class="icon-button">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 5L9 18L12.5 13.5L17.5 12L6 5Z"
                            stroke="currentcolor"
                            stroke-width="2" />
                    </svg>
                </button>
                <button class="icon-button">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <line
                            x1="6"
                            y1="8"
                            x2="4"
                            y2="8"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="6"
                            y1="16"
                            x2="4"
                            y2="16"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="20"
                            y1="8"
                            x2="18"
                            y2="8"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="20"
                            y1="16"
                            x2="18"
                            y2="16"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="8"
                            y1="6"
                            x2="8"
                            y2="4"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="16"
                            y1="6"
                            x2="16"
                            y2="4"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="8"
                            y1="20"
                            x2="8"
                            y2="18"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="16"
                            y1="20"
                            x2="16"
                            y2="18"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <rect
                            x="8"
                            y="8"
                            width="8"
                            height="8"
                            stroke="currentcolor"
                            stroke-width="2" />
                    </svg>
                </button>
                <button class="icon-button">
                    <svg
                        width="44"
                        height="44"
                        viewBox="0 0 44 44"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect
                            x="15"
                            y="15"
                            width="14"
                            height="14"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <path d="M42 41V34L35 41H42Z" fill="white" fill-opacity="0.2" />
                    </svg>
                </button>
                <button class="icon-button">
                    <svg
                        width="44"
                        height="44"
                        viewBox="0 0 44 44"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M42 42V35L35 42H42Z" fill="white" fill-opacity="0.2" />
                        <path
                            d="M17.125 24.125L15.625 15.125L24.625 16.625L27.625 22.625L23.125 27.125L17.125 24.125Z"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <path
                            d="M21.9179 21.3321L15.6679 15.0821"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="24.6679"
                            y1="30.1679"
                            x2="30.6679"
                            y2="24.1679"
                            stroke="currentcolor"
                            stroke-width="2" />
                    </svg>
                </button>
                <button class="icon-button">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <line
                            x1="6"
                            y1="9"
                            x2="6"
                            y2="7"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="18"
                            y1="9"
                            x2="18"
                            y2="7"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="12"
                            y1="18"
                            x2="12"
                            y2="8"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="5"
                            y1="6"
                            x2="19"
                            y2="6"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <line
                            x1="9"
                            y1="19"
                            x2="15"
                            y2="19"
                            stroke="currentcolor"
                            stroke-width="2" />
                    </svg>
                </button>
                <button class="icon-button">
                    <svg
                        width="44"
                        height="44"
                        viewBox="0 0 44 44"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M30 14.3571H15V27.2143H18.5V30.9643L23.5 27.2143H30V14.3571Z"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <circle cx="30" cy="15.2143" r="5" fill="#F2321E" />
                    </svg>
                </button>
                <svg
                    class="line"
                    width="1"
                    height="26"
                    viewBox="0 0 1 26"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <line x1="0.5" x2="0.5" y2="26" stroke="currentcolor" />
                </svg>
                <button class="icon-button">
                    <svg
                        width="18"
                        height="19"
                        viewBox="0 0 18 19"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 5.07854V13.1571M5 15.1767H13M15 13.1571V5.07854M13 3.05891H5"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <path
                            d="M5 3.05891C5 4.18897 4.09538 5.08836 3 5.08836C1.90462 5.08836 1 4.18897 1 3.05891C1 1.92884 1.90462 1.02945 3 1.02945C4.09538 1.02945 5 1.92884 5 3.05891Z"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <path
                            d="M17 3.05891C17 4.18897 16.0954 5.08836 15 5.08836C13.9046 5.08836 13 4.18897 13 3.05891C13 1.92884 13.9046 1.02945 15 1.02945C16.0954 1.02945 17 1.92884 17 3.05891Z"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <path
                            d="M5 15.1767C5 16.3068 4.09538 17.2062 3 17.2062C1.90462 17.2062 1 16.3068 1 15.1767C1 14.0467 1.90462 13.1473 3 13.1473C4.09538 13.1473 5 14.0467 5 15.1767Z"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <path
                            d="M17 15.1767C17 16.3068 16.0954 17.2062 15 17.2062C13.9046 17.2062 13 16.3068 13 15.1767C13 14.0467 13.9046 13.1473 15 13.1473C16.0954 13.1473 17 14.0467 17 15.1767Z"
                            stroke="currentcolor"
                            stroke-width="2" />
                    </svg>
                </button>
                <button class="icon-button">
                    <svg
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 12.1178L12 4.03927L3.99994 12.1178L12 20.1964L13.5 18.6816"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <path
                            d="M11 11.108L17 16.662V20.1964"
                            stroke="currentcolor"
                            stroke-width="2" />
                        <path d="M11 15.1473V11.108H15" stroke="#E1E2EA" stroke-width="2" />
                    </svg>
                </button>
                <button class="icon-button">
                    <svg
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19 12.1178C19 16.0364 15.8568 19.1964 12 19.1964C8.1432 19.1964 5 16.0364 5 12.1178C5 8.19921 8.1432 5.03927 12 5.03927C15.8568 5.03927 19 8.19921 19 12.1178Z"
                            stroke="#3ED67E"
                            stroke-width="2" />
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M8 19.0658C10.3912 17.669 12 15.0582 12 12.068C12 9.07784 10.3912 6.46708 8 5.07026C5.6088 6.46708 4 9.07784 4 12.068C4 15.0582 5.6088 17.669 8 19.0658Z"
                            fill="#3ED67E" />
                    </svg>
                </button>
                <button class="icon-button">
                    <svg
                        width="44"
                        height="44"
                        viewBox="0 0 44 44"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M24 14H14V24.0982H20V30.1571H30V20.0589H24V14Z"
                            fill="#3ED67E" />
                        <path
                            d="M42 41.9705V34.9018L35 41.9705H42Z"
                            fill="white"
                            fill-opacity="0.2" />
                    </svg>
                </button>
                <button class="icon-button">
                    <svg
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 4V17H20" stroke="currentcolor" stroke-width="2" />
                        <path d="M17 20V7H4" stroke="currentcolor" stroke-width="2" />
                        <line
                            x1="7.29289"
                            y1="16.2929"
                            x2="19.3137"
                            y2="4.27208"
                            stroke="currentcolor"
                            stroke-width="2" />
                    </svg>
                </button>
            </div>
            <div class="right">
                <button class="icon-button">
                    <svg
                        width="30"
                        height="30"
                        viewBox="0 0 30 30"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path
                            d="M15 1C7.26801 1 1 7.26801 1 15C1 22.732 7.26801 29 15 29C22.732 29 29 22.732 29 15C29 11.4494 27.6783 8.20758 25.5 5.73961"
                            stroke="url(#paint0_angular)"
                            stroke-width="2"
                            stroke-linecap="round" />
                        <circle cx="14.9995" cy="15" r="11" fill="url(#pattern0)" />
                        <defs>
                            <pattern
                                id="pattern0"
                                patternContentUnits="objectBoundingBox"
                                width="1"
                                height="1">
                                <use xlink:href="#image0" transform="scale(0.003125)" />
                            </pattern>
                            <radialGradient
                                id="paint0_angular"
                                cx="0"
                                cy="0"
                                r="1"
                                gradientUnits="userSpaceOnUse"
                                gradientTransform="translate(15 15) rotate(-67.8906) scale(15.1112)">
                                <stop stop-color="#24FFFF" />
                                <stop offset="1" stop-color="#7720FF" />
                            </radialGradient>
                            <image
                                id="image0"
                                width="320"
                                height="320"
                                xlink:href="http://localhost/payment-gateway/assets/shop/157944600.png" />

                            <!-- <image
                id="image0"
                width="320"
                height="320"
                xlink:href="data:image/jpeg;base64,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"
              />-->
                        </defs>
                    </svg>
                </button>
                <button class="icon-button">
                    <svg
                        width="28"
                        height="28"
                        viewBox="0 0 28 28"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="14" cy="14" r="14" fill="#1ABDFF" />
                        <path
                            d="M14.8 15.875C11.16 15.875 8.08333 17.9583 7 19C7.65 13.375 12.4167 12.125 14.8 11.5V9L20 14L14.8 18.375V15.875Z"
                            fill="white" />
                    </svg>
                </button>
                <svg
                    class="line right"
                    width="1"
                    height="26"
                    viewBox="0 0 1 26"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <line x1="0.5" x2="0.5" y2="26" stroke="#161724" />
                </svg>
                <button class="icon-button">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M28 14C28 21.732 21.732 28 14 28C6.26801 28 0 21.732 0 14C0 6.26801 6.26801 0 14 0C21.732 0 28 6.26801 28 14Z" fill="#33354A" />
                        <path d="M19 14L11.5 18.3301V9.66987L19 14Z" fill="white" />
                    </svg>
                </button>
                <button class="icon-button">
                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="22" cy="22" r="14" fill="#33354A" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 27C26.5714 27 30 23.25 30 22C30 20.75 26.5714 17 22 17C17.4286 17 14 20.75 14 22C14 23.25 17.4286 27 22 27ZM22 25C23.6569 25 25 23.6569 25 22C25 20.3431 23.6569 19 22 19C20.3431 19 19 20.3431 19 22C19 23.6569 20.3431 25 22 25Z" fill="white" />
                    </svg>

                </button>
                <div class="zoom-input">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="7" cy="7" r="4" stroke="#8D8EA1" stroke-width="2" />
                        <line x1="12.2929" y1="12.7071" x2="10.2929" y2="10.7071" stroke="#8D8EA1" stroke-width="2" />
                    </svg>
                    <input type="text" placeholder="100%">
                </div>

            </div>
        </div>
        <div class="app-content">
            <div class="side-bar">
                <ul class="collapsible-accordion">
                    <li>
                        <div class="collapsible-header">
                            <span class="arrow"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.5 6L8 10.5L12.5 6" stroke="#515367" stroke-width="2" />
                                </svg>
                            </span>
                            <p>1.Figma app</p>
                        </div>
                        <div class="collapsible-body">
                            <ul class="collapsible-content">
                                <li>
                                    <div class="collapsible-sub-header">
                                        <span class="arrow"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.5 6L8 10.5L12.5 6" stroke="#515367" stroke-width="2" />
                                            </svg>
                                        </span>
                                        <span class="folder">
                                            <svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 2h15a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V2z" fill="url(#paint0_linear)" />
                                                <path d="M0 1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v1H0V1z" fill="url(#paint1_linear)" />
                                                <defs>
                                                    <linearGradient id="paint0_linear" x1="1" y1="3.5" x2="14.157" y2="6.891" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#5492FF" />
                                                        <stop offset="1" stop-color="#545EFF" />
                                                    </linearGradient>
                                                    <linearGradient id="paint1_linear" x1=".875" y1=".273" x2="5.711" y2="6.272" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#5492FF" />
                                                        <stop offset="1" stop-color="#545EFF" />
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </span>
                                        <span>Header</span>
                                    </div>
                                    <div class="collapsible-body"></div>
                                </li>
                                <li>
                                    <div class="collapsible-sub-header">
                                        <span class="arrow"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.5 6L8 10.5L12.5 6" stroke="#515367" stroke-width="2" />
                                            </svg>
                                        </span>
                                        <span class="folder">
                                            <svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 2h15a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V2z" fill="url(#paint0_linear)" />
                                                <path d="M0 1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v1H0V1z" fill="url(#paint1_linear)" />
                                                <defs>
                                                    <linearGradient id="paint0_linear" x1="1" y1="3.5" x2="14.157" y2="6.891" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#5492FF" />
                                                        <stop offset="1" stop-color="#545EFF" />
                                                    </linearGradient>
                                                    <linearGradient id="paint1_linear" x1=".875" y1=".273" x2="5.711" y2="6.272" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#5492FF" />
                                                        <stop offset="1" stop-color="#545EFF" />
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </span>
                                        <span>Sub header</span>
                                    </div>
                                    <div class="collapsible-body">
                                        <ul class="collapsible-sub-content">
                                            <li>
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <line x1="6" y1="9" x2="6" y2="7" stroke="#4D4F60" stroke-width="2" />
                                                        <line x1="18" y1="9" x2="18" y2="7" stroke="#4D4F60" stroke-width="2" />
                                                        <line x1="12" y1="18" x2="12" y2="8" stroke="#4D4F60" stroke-width="2" />
                                                        <line x1="5" y1="6" x2="19" y2="6" stroke="#4D4F60" stroke-width="2" />
                                                        <line x1="9" y1="19" x2="15" y2="19" stroke="#4D4F60" stroke-width="2" />
                                                    </svg>
                                                </span>
                                                <span>Title</span>
                                            </li>
                                            <li class="content-wrapper">
                                                <span class="list-content-left">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="6" y1="9" x2="6" y2="7" stroke="#4D4F60" stroke-width="2" />
                                                            <line x1="18" y1="9" x2="18" y2="7" stroke="#4D4F60" stroke-width="2" />
                                                            <line x1="12" y1="18" x2="12" y2="8" stroke="#4D4F60" stroke-width="2" />
                                                            <line x1="5" y1="6" x2="19" y2="6" stroke="#4D4F60" stroke-width="2" />
                                                            <line x1="9" y1="19" x2="15" y2="19" stroke="#4D4F60" stroke-width="2" />
                                                        </svg>
                                                    </span>
                                                    <span>Sub title</span>
                                                </span>
                                                <span class="list-content-right">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 7H13V14H3V7Z" fill="#515367" />
                                                        <path d="M5 7V4C5 2.89543 6.34315 2 8 2C9.65685 2 11 2.89543 11 4V7" stroke="#515367" stroke-width="2" />
                                                    </svg>
                                                </span>
                                            </li>
                                            <li class="content-wrapper">
                                                <span class="list-content-left">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="5.29289" y1="18.2929" x2="18.0208" y2="5.56497" stroke="#D5D7E8" stroke-width="2" />
                                                        </svg>
                                                    </span>
                                                    <span>Line</span>
                                                </span>
                                                <span class="list-content-right">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 13C12.5714 13 16 9.25 16 8C16 6.75 12.5714 3 8 3C3.42857 3 0 6.75 0 8C0 9.25 3.42857 13 8 13ZM8 11C9.65686 11 11 9.65686 11 8C11 6.34314 9.65686 5 8 5C6.34314 5 5 6.34314 5 8C5 9.65686 6.34314 11 8 11Z" fill="#515367" />
                                                    </svg>
                                                </span>
                                            </li>
                                            <li>
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3.99994" y="12" width="11.3137" height="11.3137" transform="rotate(-45 3.99994 12)" stroke="#BB6BD9" stroke-width="2" />
                                                    </svg>
                                                </span>
                                                <span class="font-color">Elements/Logo</span>
                                            </li>
                                            <li>
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="8.99997" y="7" width="4.24264" height="4.24264" transform="rotate(-45 8.99997 7)" fill="#713588" stroke="#BB6BD9" stroke-width="2" />
                                                        <rect x="3.99997" y="12" width="4.24264" height="4.24264" transform="rotate(-45 3.99997 12)" fill="#713588" stroke="#BB6BD9" stroke-width="2" />
                                                        <rect x="14" y="12" width="4.24264" height="4.24264" transform="rotate(-45 14 12)" fill="#713588" stroke="#BB6BD9" stroke-width="2" />
                                                        <rect x="8.99997" y="17" width="4.24264" height="4.24264" transform="rotate(-45 8.99997 17)" fill="#713588" stroke="#BB6BD9" stroke-width="2" />
                                                    </svg>
                                                </span>
                                                <span class="font-color">Buttons - CTA</span>
                                            </li>
                                            <li>
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="5" y="5" width="14" height="14" stroke="#4D4F60" stroke-width="2" />
                                                    </svg>
                                                </span>
                                                <span>Background</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-sub-header">
                                        <span class="arrow"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.5 6L8 10.5L12.5 6" stroke="#515367" stroke-width="2" />
                                            </svg>
                                        </span>
                                        <span class="folder">
                                            <svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 2h15a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V2z" fill="url(#paint0_linear)" />
                                                <path d="M0 1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v1H0V1z" fill="url(#paint1_linear)" />
                                                <defs>
                                                    <linearGradient id="paint0_linear" x1="1" y1="3.5" x2="14.157" y2="6.891" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#5492FF" />
                                                        <stop offset="1" stop-color="#545EFF" />
                                                    </linearGradient>
                                                    <linearGradient id="paint1_linear" x1=".875" y1=".273" x2="5.711" y2="6.272" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#5492FF" />
                                                        <stop offset="1" stop-color="#545EFF" />
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </span>
                                        <span>Content</span>
                                    </div>
                                    <div class="collapsible-body"></div>
                                </li>
                                <li>
                                    <div class="collapsible-sub-header">
                                        <span class="arrow"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.5 6L8 10.5L12.5 6" stroke="#515367" stroke-width="2" />
                                            </svg>
                                        </span>
                                        <span class="folder">
                                            <svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 2h15a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V2z" fill="url(#paint0_linear)" />
                                                <path d="M0 1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v1H0V1z" fill="url(#paint1_linear)" />
                                                <defs>
                                                    <linearGradient id="paint0_linear" x1="1" y1="3.5" x2="14.157" y2="6.891" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#5492FF" />
                                                        <stop offset="1" stop-color="#545EFF" />
                                                    </linearGradient>
                                                    <linearGradient id="paint1_linear" x1=".875" y1=".273" x2="5.711" y2="6.272" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#5492FF" />
                                                        <stop offset="1" stop-color="#545EFF" />
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </span>
                                        <span>Footer</span>
                                    </div>
                                    <div class="collapsible-body"></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            <span class="arrow"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.5 6L8 10.5L12.5 6" stroke="#515367" stroke-width="2" />
                                </svg>
                            </span>
                            <p>2.Logo</p>
                        </div>
                        <div class="collapsible-body">
                            <ul class="collapsible-content">
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            <span class="arrow"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.5 6L8 10.5L12.5 6" stroke="#515367" stroke-width="2" />
                                </svg>
                            </span>
                            <p>3.Icons</p>
                        </div>
                        <div class="collapsible-body">
                            <ul class="collapsible-content">
                            </ul>
                        </div>
                    </li>

                </ul>

            </div>
            <div class="content" style="align-items: normal; padding: 20px; overflow: hidden;">
                <div class="content-area-wrapper">
                    <p>Home Page</p>
                    <div class="content-area" style="background: inherit;">
                        <iframe style="height: calc(100vh  + calc(100vh * 0.3)) !important; max-width: calc(400vw - 25px); width: 100vw; transform: scale(0.7); transform-origin: 0 0; border: 3px solid #6c2bd9; transition: .3s; border-radius: 13px;" src="http://localhost/online-store.varsitymarket.package/website-builder/canvas/"></iframe>
                    </div>
                </div>
            </div>
            <div class="inspector" style="z-index: 10; height: 80vh !important; position: absolute; left: calc(100vw - 16rem); top: 90px;">
                <input
                    class="nav-inspector"
                    name="nav-inspector"
                    type="radio"
                    id="design"
                    checked />
                <input
                    class="nav-input"
                    name="nav-inspector"
                    type="radio"
                    id="prototype" />
                <input
                    class="nav-inspector"
                    name="nav-inspector"
                    type="radio"
                    id="code" />
                <input
                    class="nav-inspector"
                    name="nav-inspector"
                    type="radio"
                    id="right-arrow" />
                <div class="inspector-sections">
                    <div class="wrapper">
                        <label for="design" checked>Design</label>
                        <label for="prototype" checked>Prototype</label>
                        <label for="code" checked>Code</label>
                        <label for="right-arrow" checked>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.75 12.75L10.25 8.25L5.75 3.75" stroke="#3C3E52" stroke-width="2" />
                            </svg>
                        </label>
                    </div>
                </div>
                <div class="inspector-tools">
                    <div class="wrapper">
                        <button class="inspector-tool-item">
                            <svg class="dark-item" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="6" y1="20" x2="6" y2="4" stroke="currentcolor" stroke-width="2" />
                                <line x1="9" y1="8" x2="20" y2="8" stroke="currentcolor" stroke-width="4" />
                                <line x1="9" y1="14" x2="16" y2="14" stroke="currentcolor" stroke-width="4" />
                            </svg>

                        </button>
                        <button class="inspector-tool-item">
                            <svg class="dark-item" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="12" y1="20" x2="12" y2="4" stroke="currentcolor" stroke-width="2" />
                                <line x1="5" y1="8" x2="19" y2="8" stroke="currentcolor" stroke-width="4" />
                                <line x1="7" y1="14" x2="17" y2="14" stroke="currentcolor" stroke-width="4" />
                            </svg>

                        </button>
                        <button class="inspector-tool-item">
                            <svg class="dark-item" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line y1="-1" x2="16" y2="-1" transform="matrix(0 -1 -1 0 17 20)" stroke="currentcolor" stroke-width="2" />
                                <line y1="-2" x2="11" y2="-2" transform="matrix(-1 0 0 1 15 10)" stroke="currentcolor" stroke-width="4" />
                                <line y1="-2" x2="7" y2="-2" transform="matrix(-1 0 0 1 15 16)" stroke="currentcolor" stroke-width="4" />
                            </svg>

                        </button>
                        <button class="inspector-tool-item">
                            <svg class="dark-item" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line y1="-1" x2="16" y2="-1" transform="matrix(-1 0 0 1 20 7)" stroke="currentcolor" stroke-width="2" />
                                <line y1="-2" x2="11" y2="-2" transform="matrix(0 1 1 0 10 9)" stroke="currentcolor" stroke-width="4" />
                                <line y1="-2" x2="7" y2="-2" transform="matrix(0 1 1 0 16 9)" stroke="currentcolor" stroke-width="4" />
                            </svg>

                        </button>
                        <button class="inspector-tool-item">
                            <svg class="dark-item" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="20" y1="12" x2="4" y2="12" stroke="currentcolor" stroke-width="2" />
                                <line x1="8" y1="19" x2="8" y2="5" stroke="currentcolor" stroke-width="4" />
                                <line x1="14" y1="17" x2="14" y2="7" stroke="currentcolor" stroke-width="4" />
                            </svg>

                        </button>
                        <button class="inspector-tool-item">
                            <svg class="dark-item" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="20" y1="18" x2="4" y2="18" stroke="currentcolor" stroke-width="2" />
                                <line x1="8" y1="15" x2="8" y2="4" stroke="currentcolor" stroke-width="4" />
                                <line x1="14" y1="15" x2="14" y2="8" stroke="currentcolor" stroke-width="4" />
                            </svg>
                        </button>
                        <button class="inspector-tool-item">
                            <svg class="light-item" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line y1="-1" x2="16" y2="-1" transform="matrix(0 -1 -1 0 17 20)" stroke="currentcolor" stroke-width="2" />
                                <line y1="-1" x2="16" y2="-1" transform="matrix(0 -1 -1 0 5 20)" stroke="currentcolor" stroke-width="2" />
                                <line x1="12" y1="15" x2="12" y2="9" stroke="currentcolor" stroke-width="4" />
                            </svg>
                        </button>
                        <button class="inspector-tool-item">
                            <svg class="light-item" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line y1="-1" x2="16" y2="-1" transform="matrix(-1 0 0 1 20 7)" stroke="currentcolor" stroke-width="2" />
                                <line y1="-1" x2="16" y2="-1" transform="matrix(-1 0 0 1 20 19)" stroke="currentcolor" stroke-width="2" />
                                <line x1="15" y1="12" x2="9" y2="12" stroke="currentcolor" stroke-width="4" />
                            </svg>

                        </button>
                    </div>
                </div>
                <div class="inspector-inputs">
                    <div class="wrapper">
                        <div class="left">
                            <div class="input-wrapper">
                                <p>X</p>
                                <input type="text" placeholder="621">
                            </div>
                            <div class="input-wrapper">
                                <p>Y</p>
                                <input type="text" placeholder="412">
                            </div>
                            <div class="input-wrapper">
                                <p>W</p>
                                <input type="text" placeholder="98">
                            </div>
                            <div class="input-wrapper">
                                <p>H</p>
                                <input type="text" placeholder="98">
                            </div>
                            <div class="input-wrapper">
                                <p>R</p>
                                <input type="text" placeholder="0º">
                            </div>
                        </div>
                        <div class="right">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 6V5C5 3.34315 6.34315 2 8 2C9.65685 2 11 3.34315 11 5V6" stroke="#8D8EA1" stroke-width="2" />
                                <path d="M5 10V11C5 12.6569 6.34315 14 8 14C9.65685 14 11 12.6569 11 11V10" stroke="#8D8EA1" stroke-width="2" />
                                <line x1="8" y1="12" x2="8" y2="4" stroke="#8D8EA1" stroke-width="2" />
                            </svg>

                        </div>
                    </div>
                </div>
                <div class="inspector-constraints">
                    <div class="wrapper">
                        <p class="inspector-header">CONSTRAINTS</p>
                        <div class="constraints-wrapper">
                            <div class="left-area">
                                <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="65" height="65" rx="2.5" stroke="#4D4F60" />
                                    <rect x="20.5" y="20.5" width="25" height="25" rx="0.5" stroke="#4D4F60" stroke-miterlimit="16" stroke-linecap="square" stroke-dasharray="4 4" />
                                    <line x1="33" y1="61" x2="33" y2="51" stroke="#4D4F60" stroke-width="4" />
                                    <line x1="33" y1="15" x2="33" y2="5" stroke="#3ED67E" stroke-width="4" />
                                    <line x1="33" y1="39" x2="33" y2="27" stroke="#4D4F60" stroke-width="2" />
                                    <line x1="5" y1="32" x2="15" y2="32" stroke="#3ED67E" stroke-width="4" />
                                    <line x1="27" y1="33" x2="39" y2="33" stroke="#4D4F60" stroke-width="2" />
                                    <line x1="51" y1="32" x2="61" y2="32" stroke="#4D4F60" stroke-width="4" />
                                </svg>
                            </div>
                            <div class="right-area">
                                <div class="first-constraint">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="4" y1="8" x2="12" y2="8" stroke="#8D8EA1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 8L4.5 5.5V10.5L2 8Z" fill="#8D8EA1" />
                                        <path d="M13.5 8L11 5.5V10.5L13.5 8Z" fill="#8D8EA1" />
                                    </svg>
                                    <div class="styled-select">
                                        <select class="styled-select">
                                            <option>Left</option>
                                            <option>Right</option>
                                        </select>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 10L4.5359 6.25L11.4641 6.25L8 10Z" fill="#8D8EA1" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="second-constraint">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="8" y1="12" x2="8" y2="4" stroke="#8D8EA1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8 14L5.5 11.5H10.5L8 14Z" fill="#8D8EA1" />
                                        <path d="M8 2.5L5.5 5L10.5 5L8 2.5Z" fill="#8D8EA1" />
                                    </svg>
                                    <div class="styled-select">
                                        <select class="styled-select">
                                            <option>Top</option>
                                            <option>Bottom</option>
                                        </select>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 10L4.5359 6.25L11.4641 6.25L8 10Z" fill="#8D8EA1" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inspector-layer">
                    <div class="wrapper">
                        <p class="inspector-header">LAYER</p>
                        <div class="layer-wrapper">
                            <div class="styled-select">
                                <select class="styled-select">
                                    <option>Pass Through</option>
                                    <option></option>
                                </select>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 10L4.5359 6.25L11.4641 6.25L8 10Z" fill="#8D8EA1" />
                                </svg>
                            </div>
                            <input type="text" placeholder="100%">
                            <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 10C12.5715 10 16 6.25 16 5C16 3.75 12.5715 0 8 0C3.42847 0 0 3.75 0 5C0 6.25 3.42847 10 8 10ZM8 8C9.65674 8 11 6.65686 11 5C11 3.34314 9.65674 2 8 2C6.34326 2 5 3.34314 5 5C5 6.65686 6.34326 8 8 8Z" fill="#4D4F60" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="inspector-fill">
                    <div class="wrapper">
                        <div class="header">
                            <p class="inspector-header">FILL</p>
                            <div class="fill-icons">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="4" y1="8.53333" x2="12" y2="8.53333" stroke="#4D4F60" stroke-width="2" />
                                </svg>
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="8" y1="12.5333" x2="8" y2="4.53333" stroke="#4D4F60" stroke-width="2" />
                                    <line x1="4" y1="8.53333" x2="12" y2="8.53333" stroke="#4D4F60" stroke-width="2" />
                                </svg>
                            </div>
                        </div>

                        <div class="fill-content">
                            <div class="color-input-area">
                                <input type="text" placeholder="#3ED67E">
                            </div>
                            <input class="input-percent" type="text" placeholder="100%">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.5 9.27273C3.5 8.74889 3.76128 7.99741 4.22449 7.11006C4.67793 6.24145 5.28799 5.31032 5.90622 4.44883C6.52313 3.5892 7.14108 2.80868 7.60537 2.24253C7.75476 2.06036 7.88804 1.90063 8 1.76788C8.11196 1.90063 8.24524 2.06036 8.39463 2.24253C8.85892 2.80868 9.47687 3.5892 10.0938 4.44883C10.712 5.31032 11.3221 6.24145 11.7755 7.11006C12.2387 7.99741 12.5 8.74889 12.5 9.27273C12.5 11.5813 10.5121 13.5 8 13.5C5.48792 13.5 3.5 11.5813 3.5 9.27273Z" stroke="#4D4F60" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.36328 11.0455C4.10498 9.31299 5.90137 8.09088 7.99976 8.09088C10.0981 8.09088 11.8945 9.31299 12.6362 11.0455C11.8945 12.7779 10.0981 14 7.99976 14C5.90137 14 4.10498 12.7779 3.36328 11.0455Z" fill="#4D4F60" />
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 13C12.5715 13 16 9.25 16 8C16 6.75 12.5715 3 8 3C3.42847 3 0 6.75 0 8C0 9.25 3.42847 13 8 13ZM8 11C9.65674 11 11 9.65686 11 8C11 6.34314 9.65674 5 8 5C6.34326 5 5 6.34314 5 8C5 9.65686 6.34326 11 8 11Z" fill="#4D4F60" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="stroke">
                    <div class="wrapper">
                        <div class="header">
                            <p class="inspector-header">STROKE</p>
                            <div class="fill-icons">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="8" y1="12.5333" x2="8" y2="4.53333" stroke="#4D4F60" stroke-width="2" />
                                    <line x1="4" y1="8.53333" x2="12" y2="8.53333" stroke="#4D4F60" stroke-width="2" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="effects">
                        <div class="wrapper">
                            <div class="header">
                                <p class="inspector-header">EFFECTS</p>
                                <div class="fill-icons">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="8" y1="12.5333" x2="8" y2="4.53333" stroke="#4D4F60" stroke-width="2" />
                                        <line x1="4" y1="8.53333" x2="12" y2="8.53333" stroke="#4D4F60" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="export">
                        <div class="wrapper">
                            <div class="header">
                                <p class="inspector-header">EXPORT</p>
                                <div class="fill-icons">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="8" y1="12.5333" x2="8" y2="4.53333" stroke="#4D4F60" stroke-width="2" />
                                        <line x1="4" y1="8.53333" x2="12" y2="8.53333" stroke="#4D4F60" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                            <p class="export-text">Click + to add an export setting</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var checkbox = document.querySelector('input[type="checkbox"]');

            checkbox.addEventListener('change', function() {
                document.documentElement.classList.toggle('switch');
            });
        });

        const button = document.querySelector('.icon-button.inline');
        const nav = document.querySelector('nav');
        const links = document.querySelectorAll('a');
        const colorInput = document.querySelector('.color-input-area input');
        const colorArea = document.querySelector('.color-input-area');

        button.addEventListener('click', function() {
            nav.classList.toggle('is-opened');
            links.forEach(function(link, index) {
                link.setAttribute('style', `animation-delay: ${index * .1}s`);
            });
        });

        colorInput.addEventListener('keyup', (e) => {
            colorArea.style.backgroundColor = e.target.value;
            colorArea.style.borderColor = e.target.value;
        });
    </script>
</body>

</html>