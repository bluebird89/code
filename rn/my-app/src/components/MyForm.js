import React from 'react';

const Text = props => <input type="text" {...props} />

const Select = ({ options, ...others }) => (
    <select {...others}>
        {Object.keys(options)
            .map((optionKey, index) => (
                <option value={optionKey} key={index}>{options[optionKey]}</option>
            ))
        }
    </select>
)

class MyForm extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            username: '',
            age: null,
            description: 'The content of a textarea goes in the value attribute',
            mycar: 'Volvo',
            errormessage: ''
        };
    }

    myChangeHandler = (event) => {
        let nam = event.target.name;
        let val = event.target.value;
        let err = '';
        if (nam === "age") {
            if (val !== "" && !Number(val)) {
                err = <strong>Your age must be a number</strong>;
            }

        }
        this.setState({ errormessage: err });
        this.setState({ [nam]: val });
    }

    mySubmitHandler = (event) => {
        event.preventDefault();
        let age = this.state.age;
        if (!Number(age)) {
            alert("Your age must be a number");
        }
        alert("You are submitting " + this.state.username);
    }

    render() {
        const mystyle = {
            color: "white",
            backgroundColor: "DodgerBlue",
            padding: "10px",
            fontFamily: "Arial"
        };

        let header = '';
        if (this.state.username) {
            // camelCased Property
            header = <h1 style={{ backgroundColor: "lightblue" }}>Hello {this.state.username} {this.state.age}</h1>;
        } else {
            header = '';
        }
        return (
            <form onSubmit={this.mySubmitHandler}>
                {header}
                <p style={mystyle}>Enter your name:</p>
                <input
                    type="text"
                    name='username'
                    onChange={this.myChangeHandler}
                />

                <p>Enter your age:</p>
                <input
                    type='text'
                    name='age'
                    onChange={this.myChangeHandler}
                />
                <select value={this.state.mycar}>
                    <option value="Ford">Ford</option>
                    <option value="Volvo">Volvo</option>
                    <option value="Fiat">Fiat</option>
                </select>
                <textarea value={this.state.description} />
                <input
                    type='submit'
                />
                {/* Inline Styling */}
                <h6 style={{ color: "red" }}> {this.state.errormessage}</h6>
            </form >
        );
    }
}

export default MyForm;
