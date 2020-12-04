function FancyBorder(props) {
    return (
        <div className={'FancyBorder FancyBorder-' + props.color}>
            {props.children}
        </div>
    );
}

function Dialog(props) {
    return (
        <FancyBorder color="blue">
            <h1 className="Dialog-title">
                {props.title}
            </h1>
            <p className="Dialog-message">
                {props.message}
            </p>
        </FancyBorder>
    );
}

function WelcomeDialog() {
    return (
        <FancyBorder color="blue">
            <h1 className="Dialog-title">
                Welcome
        </h1>
            <p className="Dialog-message">
                Thank you for visiting our spacecraft!
        </p>
        </FancyBorder>
    );
}

function HelloDialog() {
    return (
        <Dialog
            title="Hello"
            message="I'm new Comer!" />
    );
}
