
class Person {
	constructor(
		public first_name: string,
		public last_name: last_name
	) { }
}

class ListComponent {
	private _things: Array<ListItem>;
	constructor() {
		this._things = [];
	}
	get things(): Array<ListItem> { return this._things; }
}

class CompletedListItem extends ListItem {
	completed: boolean;
	constructor(name: string) {
		super(name);
		this.completed = true;
	}
}

interface User {
	name: string;
	email: string;
}

class RegisteredUser implements User {
	constructor(
		public name: string,
		public email: string
	) { }
}
