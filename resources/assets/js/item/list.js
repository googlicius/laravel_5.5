import axios from 'axios'

class ItemList {
    async deleteItem(id) {
        if (confirm('Are you sure want to delete this item?')) {
            const response = await axios.delete('/item/' + id)
            if (response.status === 200) {
                location.reload()
            }
        }
    }

    /**
     * Change category
     *
     * @param {HTMLElement} el
     */
    changeCategory(el) {
        jQuery(el)
            .closest('form')
            .submit()
    }
}

export default ItemList
