#include <bits/stdc++.h>

using namespace std;
const int maxN = 1e5 + 10;
const int oo = 0x3c3c3c3c;
int n, m;
vector<int> a[maxN];
int N[maxN], L[maxN], Count, cnt;
stack<int> st;

void visit(int u)
{
	L[u] = N[u] = ++cnt;
	st.push(u);
	for(int i = 0; i < a[u].size(); ++i)
	{
		int v = a[u][i];
		if(N[v]) L[u] = min(L[u], N[v]);
		else
		{
			visit(v);
			L[u] = min(L[u], L[v]);
		}
	}
	if(L[u] == N[u])
	{
		Count++;
		int v;
		do
		{
			v = st.top();
			st.pop();
			L[u] = N[u] = oo;
		}while(v != u);
	}
}
int main()
{
	cin >> n >> m;
	int x, y;
	for(int i = 1; i <= m; ++i)
	{
		cin >> x >> y;
		a[x].push_back(y);
	}
	for(int i = 1; i <= n; ++i) if(!N[i]) visit(i);
	cout << Count;
	return 0;
}

/*
http://vn.spoj.com/problems/TJALG/
*/