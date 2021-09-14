import React from 'react';
import ReactDOM from 'react-dom';

function Nav() {
    return (
        <div>
          <div className="nav-m">
            <div className="nav-mobile">
              <div>
                <i className="fas fa-home" />
              </div>
              <div> <i className="fas fa-search" /></div>
              <div><i className="fas fa-ellipsis-h" /></div>
              <div><i className="fas fa-bell" /></div>
              <div><img src="/images/avatar_17.jpg" alt="avatar" className="nav-mobile-avatar" /></div>
            </div>
          </div>
        </div>
      );
}

export default Nav;

