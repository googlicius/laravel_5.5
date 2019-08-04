/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Item from './item'
import Common from './common'

function App() {}

App.prototype.Item = new Item()
App.prototype.Common = new Common()

window.App = new App()
