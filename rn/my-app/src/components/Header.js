import React from 'react';
import styles from './mystyle.module.css';

class Header extends React.Component {

    constructor(props) {
        super(props);
        this.state = { favoritecolor: "red" };
    }

    shouldComponentUpdate() {
        return false;
    }

    componentDidMount() {
        setTimeout(() => {
            this.setState({ favoritecolor: "yellow" })
        }, 1000)
    }

    getSnapshotBeforeUpdate(prevProps, prevState) {
        document.getElementById("div1").innerHTML =
            "Before the update, the favorite was " + prevState.favoritecolor;
    }

    static getDerivedStateFromProps(props, state) {
        return { favoritecolor: props.favcol };
    }

    componentDidUpdate() {
        document.getElementById("div2").innerHTML =
            "The updated favorite is " + this.state.favoritecolor;
    }

    changeColor = () => {
        this.setState({ favoritecolor: "blue" });
    }

    render() {
        return (
            <div>
                <h1 className={styles.bigblue}>My Favorite Color is {this.state.favoritecolor}</h1>
                <button type="button" onClick={this.changeColor}>Change color</button>
            </div>
        );
    }
}

export default Header;
