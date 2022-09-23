@extends('sso.layout')
@section('title')
    Título de teste
@endsection
@section('subtitle')
    Subtítulo de teste
@endsection
@section('content')
    <div class="main ui intro container">

        <div class="ui dividing right rail">
            <div class="ui sticky">
                <h4 class="ui header">Getting started</h4>
                <div class="ui vertical following fluid accordion text menu">
                    <div class="item"><a class="active title"><i class="dropdown icon"></i>
                            <b>Preface</b></a>
                        <div class="active content menu"><a class="item" href="#using-build-tools">Using
                                Build Tools</a></div>
                    </div>
                    <div class="item">
                        <a class="title"><i class="dropdown icon"></i> <b>Installing</b></a>
                        <div class="content menu"><a class="item" href="#install-nodejs">Install NodeJS</a>
                            <a class="item" href="#install-gulp">Install Gulp</a>
                            <a class="item" href="#install-semantic-ui">Install Semantic UI</a>
                            <a class="item" href="#include-in-your-html">Include in Your HTML</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="title"><i class="dropdown icon"></i><b>Updating</b></a>
                        <div class="content menu"><a class="item" href="#updating-via-npm">Updating via
                                NPM</a></div>
                    </div>
                    <div class="item"><a class="title"><i class="dropdown icon"></i> <b>Next Steps</b></a>
                        <div class="content menu"><a class="item" href="#all-set">All Set!</a></div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="ui dividing header">Preface<a class="anchor" id="preface"></a></h2>

        <div class="no example">

            <h4 class="ui header">Using Build Tools</h4><i class="fitted icon code"></i><a class="anchor"
                id="using-build-tools"></a>

            <p>Semantic UI packaged Gulp build tools so your project can preserve its <a href="/usage/theming.html">own
                    theme changes</a>.</p>
            <p>The easiest way to install Semantic UI is our NPM package which contains special install
                scripts to make setup interactive and updates seamless.</p>

            <p>For installing with specific integrations like Ember, React, or Meteor, see our <a
                    href="/introduction/integrations.html">integration guide</a></p>
            <p>For integrating Semantic UI tasks into your own build tools, or using a CDN see our <a
                    href="/introduction/advanced-usage.html">recipes</a> section.</p>

        </div>
        <div class="ui large info message">
            <div class="ui header">Simpler Setup</div>
            <p>If you are using Semantic UI as a dependency and just want to use our default theme, use our
                lighter <a href="https://github.com/Semantic-Org/Semantic-UI-CSS"
                    target="_blank"><code>semantic-ui-css</code></a> or <a
                    href="https://github.com/Semantic-Org/Semantic-UI-Less"
                    target="_blank"><code>semantic-ui-less</code></a> repo. If you just need the files you
                can download them as a zip from GitHub.</p>
            <a href="https://github.com/Semantic-Org/Semantic-UI-CSS/archive/master.zip"
                class="ui secondary button">Download Zip</a>
            <a href="https://github.com/Semantic-Org/" class="ui button" target="_blank">View all
                Semantic-Org Repos </a>
        </div>

        <h2 class="ui dividing header">Installing<a class="anchor" id="installing"></a></h2>


        <div class="no example">
            <h4 class="ui header">Install NodeJS</h4><i class="fitted icon code"></i><a class="anchor"
                id="install-nodejs"></a>
            <p>If you are unfamiliar with setting up NodeJS you can follow the steps below, or check out the
                <a href="https://nodejs.org/download/" target="_blank">download page</a> on <a href="https://www.nodejs.org"
                    target="_blank">nodejs.org</a>
            </p>

            <div class="ui secondary menu">
                <a data-tab="mac" class="active item">Mac</a>
                <a data-tab="linux" class="item">Linux</a>
                <a data-tab="win" class="item">Windows</a>
            </div>
            <div class="ui active basic tab vertical segment" data-tab="mac">
                <h4>Option 1: Homebrew</h4>
                <p>After installing <a href="https://brew.sh/" target="_blank">homebrew</a></p>
                <div class="ui existing segment">
                    <pre><code class="ignored code">brew install node</code></pre>
                </div>
                <h4>Option 2: Git</h4>
                <div class="ui existing segment">
                    <pre><code class="ignored code bash">git <span class="built_in">clone</span> 
                    <span class="built_in">cd</span> node </code></pre>
                </div>
            </div>
            <div class="ui basic tab vertical segment" data-tab="linux">
                <h4>Install via PPA</h4>
                <p>Although <a href="http://www.ubuntuupdates.org/ppa/chris_lea_nodejs" target="_blank">Chris Lea's PPA</a>
                    was once the best way to install node, it is now
                    somewhat out of date.</p>
                <p>The recommended path to install Semantic UI is using <a
                        href="https://github.com/joyent/node/wiki/Installing-Node.js-via-package-manager"
                        target="_blank">Joyent's package manager</a> guide.</p>
                <h4>Ubuntu</h4>
                <div class="ignored code" data-type="bash">
                    curl --silent --location https://deb.nodesource.com/setup_6.x | sudo bash -
                    sudo apt-get install --yes nodejs
                </div>
                <h4>Debian</h4>
                <div class="ignored code" data-type="bash">
                    apt-get install curl
                    curl --silent --location https://deb.nodesource.com/setup_6.x | bash -
                    apt-get install --yes nodejs
                </div>
                <h4>Red Hat</h4>
                <div class="ignored code" data-type="bash">
                    curl --silent --location https://rpm.nodesource.com/setup | bash -
                    yum -y install nodejs
                </div>
            </div>
            <div class="ui basic tab vertical segment" data-tab="win">
                <h4>Install the exe</h4>
                <p>Download the <a href="https://nodejs.org/download/">NodeJS executable</a>.</p>
            </div>
        </div>

        <div class="no example">
            <h4>Install Gulp</h4><i class="fitted icon code"></i><a class="anchor" id="install-gulp"></a>
            <p>Semantic UI uses <a href="http://www.gulpjs.com" target="_blank">Gulp</a> to provide command
                line tools for building themed versions of the library with just the components you need.
            </p>
            <p>Gulp is an NPM module and must be installed globally</p>
            <div class="ui existing segment">
                <pre><code class="ignored code">npm install -g gulp</code></pre>
            </div>
        </div>

        <div class="no example">
            <h4>Install Semantic UI</h4><i class="fitted icon code"></i><a class="anchor" id="install-semantic-ui"></a>
            <p>Semantic UI is available in an eponymous package on NPM</p>
            <div class="ui secondary menu">
                <a class="active item" data-tab="video">
                    Video
                </a>
                <a class="item" data-tab="code">
                    Code
                </a>
            </div>
            <div class="ui active tab" data-tab="video">
                <script type="text/javascript" src="https://asciinema.org/a/22121.js" id="asciicast-22121" async=""
                                data-player="[object HTMLDivElement]"></script><div id="asciicast-container-22121" class="asciicast"
                    style="display: block; float: none; overflow: hidden; padding: 0px; margin: 20px 0px;">
                    <iframe src="https://asciinema.org/a/22121/embed?" id="asciicast-iframe-22121"
                        name="asciicast-iframe-22121" scrolling="no" allowfullscreen="true"
                        style="overflow: hidden; margin: 0px; border: 0px; display: inline-block; width: 698px; float: none; visibility: visible; height: 482px;"></iframe>
                </div>
            </div>
            <div class="ui tab" data-tab="code">
                <div class="ignored code" data-type="bash">
                    npm install semantic-ui --save
                    cd semantic/
                    gulp build
                </div>
            </div>
        </div>

        <div class="no example">

        </div>
        <h2 class="ui dividing header">Updating<a class="anchor" id="updating"></a></h2>

        <div class="no example">
            <h4>Updating via NPM</h4><i class="fitted icon code"></i><a class="anchor" id="updating-via-npm"></a>
            <p>Semantic's NPM install script will automatically update Semantic UI to the latest version
                while preserving your site and packaged themes.</p>
            <div class="ui existing segment">
                <pre><code class="ignored code">npm update</code></pre>
            </div>
        </div>

        <h2 class="ui dividing header">Next Steps<a class="anchor" id="next-steps"></a></h2>

        <div class="no example">
            <h4>All Set!</h4><i class="fitted icon code"></i><a class="anchor" id="all-set"></a>
            <p>Well done! Semantic UI is now ready to be used.</p>
            <div class="three column divided stackable center aligned ui grid">
                <div class="column">
                    <div class="ui icon header">
                        <i class="rocket circular icon"></i>
                        See how to use <a href="/introduction/build-tools.html">gulp commands</a> and build
                        tools
                    </div>
                </div>
                <div class="column">
                    <div class="ui icon header">
                        <i class="theme circular icon"></i>
                        Learn about <a href="/usage/theming.html">changing themes</a>
                    </div>
                </div>
                <div class="column">
                    <div class="ui icon header">
                        <i class="food circular icon"></i>
                        See <a href="/introduction/advanced-usage.html">recipes</a> for using Semantic UI in
                        your project
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
