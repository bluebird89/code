import React from 'react';
import { create } from 'react-test-renderer';
import App from '../App';

describe('My first snapshot test', () => {
    test('testing app button', () => {
        let tree = create(<App />)
        expect(tree.toJSON()).toMatchSnapshot();
    })
})

describe("Changing our button name to Hide", () => {

    test('toggle the button', () => {
        let tree = create(<App />);

        let instance = tree.getInstance();

        // TODO:Changing our button name to Hide › toggle the button TypeError: Cannot read property 'state' of null
        expect(instance.state.isActive).toBe(false)

        // changing  the state
        instance.handleClick();

        // isActive property is updated to `true`
        expect(instance.state.isActive).toBe(true);

        expect(tree.toJSON()).toMatchSnapshot()
    })
})
