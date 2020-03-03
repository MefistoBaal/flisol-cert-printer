import React from 'react';

export default class BreadCrumbs extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <section className="au-breadcrumb2">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="au-breadcrumb-content">
                                <div className="au-breadcrumb-left">
                                    <span className="au-breadcrumb-span">You are here:</span>
                                    <ul className="list-unstyled list-inline au-breadcrumb__list">
                                        <li className="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li className="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li className="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                                <form className="au-form-icon--sm" action="" method="post">
                                    <input className="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports..."/>
                                    <button className="au-btn--submit2" type="submit">
                                        <i className="zmdi zmdi-search"/>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        )
    }
}