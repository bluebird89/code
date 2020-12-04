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
            carBrand: 'Volvo',
            errormessage: '',
            isGoing: true,
            numberOfGuests: 2
        };
    }

    handleChange = (event) => {
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
    handleInputChange = (event) => {
        const target = event.target;
        const value = target.type === 'checkbox' ? target.checked : target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    handleSubmit = (event) => {
        event.preventDefault();
        let age = this.state.age;
        if (!Number(age)) {
            alert("Your age must be a number");
        }

        alert("You are submitting: " + this.state.username + " " + this.state.age + " " + this.state.carBrand);
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
            <form onSubmit={this.handleSubmit}>
                {header}
                {Text}
                {Select}
                <p style={mystyle}>Enter your name:</p>
                <input
                    type="text"
                    name='username'
                    onChange={this.handleChange}
                />

                <p>Enter your age:</p>
                <input
                    type='text'
                    name='age'
                    onChange={this.handleChange}
                />

                <select value={this.state.carBrand} onChange={this.handleChange} >
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
                <input type="file" />

                <label>
                    参与:
          <input
                        name="isGoing"
                        type="checkbox"
                        checked={this.state.isGoing}
                        onChange={this.handleInputChange} />
                </label>
                <br />
                <label>
                    来宾人数:
          <input
                        name="numberOfGuests"
                        type="number"
                        value={this.state.numberOfGuests}
                        onChange={this.handleInputChange} />
                </label>
            </form >
        );
    }
}

export default MyForm;
