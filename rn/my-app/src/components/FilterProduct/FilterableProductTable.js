import ProductTable from './ProductTable';
import SearchBar from './SearchBar';

function FilterableProductTable() {

    function handleSubmit() {

    }

    return (
        <div>
            <h4>物品列表</h4>
            {/* <form onSubmit={this.handleSubmit}> */}
            <SearchBar />
            <ProductTable />
            {/* </form> */}
        </div >
    )
}

export default FilterableProductTable
