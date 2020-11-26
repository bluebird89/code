import PropTypes from 'prop-types';
import React from 'react';
// 复合组件
class WebSite extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            name: this.props.name || "Deafult Name",
            site: this.props.site || "https://www.Default.com"
        };
    }

    render() {
        return (
            <div>
                <Name name={this.state.name} />
                <Link site={this.state.site} />
            </div>
        );
    }
}
WebSite.propTypes = {
    name: PropTypes.string,
}

class Name extends React.Component {
    render() {
        return (
            <h1>{this.props.name}</h1>
        );
    }
}

class Link extends React.Component {
    render() {
        return (
            <a href={this.props.site}>
                {this.props.site}
            </a>
        );
    }
}

export default WebSite;
