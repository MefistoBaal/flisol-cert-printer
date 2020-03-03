import React from 'react';

export default class WelcomeMessage extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <section className="welcome p-t-10">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <h1 className="title-4">Welcome back <span>John!</span>
                            </h1>
                            <hr className="line-seprate"/>
                        </div>
                    </div>
                </div>
            </section>
        )
    }
}